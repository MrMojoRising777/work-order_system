@extends('layouts.app')

@section('content')
    <h1>Work Orders</h1>

    <a href="{{ route('workorders.create') }}" class="btn">Create Work Order</a>

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