<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\WorkOrder;
use App\Models\WorkOrderImage;

class WorkOrderController extends Controller
{
    // Index: Show list of work orders
    public function index(Request $request)
    {
        $status = $request->input('status', ['OPEN', 'CLOSED']); // Default to both statuses
        $workOrders = WorkOrder::when(count($status) > 0, function ($query) use ($status) {
                $query->whereIn('status', $status);
            })
            ->orderBy('start_date', 'desc')
            ->get();

        return view('workorders.index', compact('workOrders', 'status'));
    }

    // Create: Show work order creation form
    public function create()
    {
        return view('workorders.create');
    }

    // Store: Save new work order
    public function store(Request $request)
    {
        // Validate data
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'employee_name' => 'required|string',
            'notes' => 'nullable|string',
            'status' => 'required|in:open,completed,other',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image in the 'images' array
        ]);

        // Create a new WorkOrder
        $workOrder = WorkOrder::create([
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'employee_name' => $request->input('employee_name'),
            'notes' => $request->input('notes'),
            'status' => $request->input('status'),
        ]);

        // Check if images were uploaded
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each uploaded image in 'public/work_order_images'
                $imagePath = $image->store('work_order_images', 'public');

                $workOrder->images()->create(['url' => $imagePath]); // Use 'url' instead of 'path'
            }
        }

        return redirect()->route('workorders.index')->with('success', 'Work Order created successfully');
    }

    // Show: Display specific work order
    public function show($id)
    {
        $workOrder = WorkOrder::find($id);

        // Convert start_date and end_date strings to Carbon instances
        $start_date = Carbon::parse($workOrder->start_date);
        $end_date = Carbon::parse($workOrder->end_date);

        // Calculate worktime
        $workOrder->worktime = $end_date->diffInMinutes($start_date);

        return view('workorders.show', ['workOrder' => $workOrder]);
    }

    // Edit: Show form to edit specific work order
    public function edit($id)
    {
        $workOrder = WorkOrder::find($id);

        return view('workorders.edit', ['workOrder' => $workOrder]);
    }

    // Update: Update specific work order
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'employee_name' => 'required|string',
            'notes' => 'nullable|string',
            'status' => 'required|in:open,completed,other',
            'image_paths' => 'nullable|string',
        ]);

        $workOrder = WorkOrder::find($id);

        $workOrder->update($validatedData);

        // Handle image uploads

        return redirect()->route('workorders.index')->with('success', 'Work order updated successfully.');
    }

    // Delete: Delete specific work order from database
    public function destroy($id)
    {
        $workOrder = WorkOrder::find($id);

        $workOrder->delete();

        return redirect()->route('workorders.index')->with('success', 'Work order successfully deleted.');
    }
}