@extends('layouts.app')

@section('content')
    <h1>Work Order Details</h1>

    <p>ID: {{ $workOrder->id }}</p>
    <p>Start Date: {{ $workOrder->start_date }}</p>
    <p>End Date: {{ $workOrder->end_date }}</p>
    <p>Employee: {{ $workOrder->employee_name }}</p>
    <p>Status: {{ $workOrder->status }}</p>
    <p>Notes: {{ $workOrder->notes }}</p>

    <p>Total work hours: {{ $workOrder->worktime }} minutes</p>

    <!-- Display image if image_url is not null -->
    @if ($workOrder->images->count() > 0)
        <div class="image-gallery">
            @foreach ($workOrder->images as $image)
                <img src="{{ asset('storage/' . $image->url) }}" alt="Work Order Image" class="responsive-img">
            @endforeach
        </div>
    @else
        <p>No images associated with this work order.</p>
    @endif

    <a href="{{ route('workorders.edit', $workOrder) }}" class="btn">Edit</a>

    <form action="{{ route('workorders.destroy', $workOrder->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn red" onclick="return confirm('Are you sure you want to delete this work order?')">Delete</button>
    </form>
@endsection