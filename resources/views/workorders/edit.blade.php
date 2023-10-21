@extends('layouts.app')

@section('content')
    <h1>Edit Work Order</h1>

    <form action="{{ route('workorders.update', $workOrder->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" value="{{ $workOrder->start_date }}" required>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" value="{{ $workOrder->end_date }}" required>

        <label for="employee_name">Employee:</label>
        <input type="text" name="employee_name" value="{{ $workOrder->employee_name }}" required>

        <label for="notes">Notes:</label>
        <textarea name="notes">{{ $workOrder->notes }}</textarea>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="open" @if ($workOrder->status === 'open') selected @endif>Open</option>
            <option value="completed" @if ($workOrder->status === 'completed') selected @endif>Completed</option>
            <option value="other" @if ($workOrder->status === 'other') selected @endif>Other</option>
        </select>

        <label for="image_paths">Image Paths:</label>
        <input type="text" name="image_paths" value="{{ $workOrder->image_paths }}">

        <button type="submit">Update</button>
    </form>
@endsection