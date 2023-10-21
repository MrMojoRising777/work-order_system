@extends('layouts.app')

@section('content')
    <h1>Work Orders</h1>

    <a href="{{ route('workorders.create') }}" class="btn">Create Work Order</a>

    <form action="{{ route('workorders.index') }}" method="get">
        <label for="status">Filter by Status:</label>
        <select name="status[]" id="status" multiple>
            <option value="open" {{ in_array('open', $status) ? 'selected' : '' }}>Open</option>
            <option value="completed" {{ in_array('completed', $status) ? 'selected' : '' }}>Completed</option>
        </select>
        <button type="submit" class="btn btn-primary">Apply Filter</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Employee</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workOrders as $workOrder)
                <tr>
                    <td>{{ $workOrder->id }}</td>
                    <td>{{ $workOrder->start_date }}</td>
                    <td>{{ $workOrder->end_date }}</td>
                    <td>{{ $workOrder->employee_name }}</td>
                    <td>{{ $workOrder->status }}</td>
                    <td>
                        <a href="{{ route('workorders.show', $workOrder) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection