<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkOrder;

class WorkOrderController extends Controller
{
    // Index: Show list of work orders
    public function index()
    {
        $workOrders = WorkOrder::orderBy('start_date', 'desc')->get();
        return view('workorders.index', compact('workOrders'));
    }

    // Create: Show work order creation form
    public function create()
    {
        return view('workorders.create');
    }

    // Store: Save new work order
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'employee_name' => 'required|string',
            'notes' => 'nullable|string',
            'status' => 'required|in:open,completed,other',
            'image_paths' => 'nullable|string',
        ]);

        $workOrder = WorkOrder::create($validatedData);

        // Handle image uploads

        return redirect()->route('workorders.index')->with('success', 'Work order created successfully.');
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