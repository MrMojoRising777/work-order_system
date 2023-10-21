<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkOrder;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
        ]);
    
        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            // Store the uploaded image in the 'public/images' directory
            $imagePath = $request->file('image')->store('public/images');
    
            // Generate a public URL for the stored image
            $imageUrl = Storage::url($imagePath);
        } else {
            $imageUrl = null;
        }
    
        // Create a new Work Order with the provided data and image URL
        WorkOrder::create([
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'employee_name' => $request->input('employee_name'),
            'notes' => $request->input('notes'),
            'status' => $request->input('status'),
            'image_url' => $imageUrl,
        ]);
    
        return redirect()->route('workorders.index')->with('success', 'Work Order created successfully');
    }

    // Show: Display specific work order
    public function show($id)
    {
        $workOrder = WorkOrder::find($id);

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

        if (!$workOrder) {
            // Handle when work order not found
        }

        $workOrder->update($validatedData);

        // Handle image uploads

        return redirect()->route('workorders.index')->with('success', 'Work order updated successfully.');
    }

    // Delete: Delete specific work order from database
    public function destroy($id)
    {
        $workOrder = WorkOrder::find($id);

        if (!$workOrder) {
            // Handle when the work order not found
        }

        $workOrder->delete();

        // Success message
    }
}