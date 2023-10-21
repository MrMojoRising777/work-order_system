@extends('layouts.app')

@section('content')
    <h1>Create Work Order</h1>

    <form method="POST" action="{{ route('workorders.store') }}">
        @csrf

        <label for="start_date">Start Date:</label>
        <input type="datetime-local" name="start_date" required>

        <label for="end_date">End Date:</label>
        <input type="datetime-local" name="end_date" required>

        <label for="employee_name">Employee Name:</label>
        <input type="text" name="employee_name" required>

        <label for="notes">Notes:</label>
        <textarea name="notes"></textarea>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="open">Open</option>
            <option value="completed">Completed</option>
            <option value="other">Other</option>
        </select>

        <!-- Additional form fields -->

        <button type="submit">Create Work Order</button>
    </form>
@endsection