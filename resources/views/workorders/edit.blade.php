@extends('layouts.app')

@section('content')
    <h1>Edit Work Order</h1>

    <form action="{{ route('workorders.update', $workOrder->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="start_date">Start Date:</label>
        <input type="datetime-local" name="start_date" value="{{ $workOrder->start_date }}" required>

        <label for="end_date">End Date:</label>
        <input type="datetime-local" name="end_date" value="{{ $workOrder->end_date }}" required>

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

        <input type="file" name="images[]" accept="image/*" multiple>

        @if ($workOrder->images->count() > 0)
        <h2>Current Images:</h2>
            <div class="image-gallery">
                @foreach ($workOrder->images as $image)
                    <div class="image">
                        <img src="{{ asset('storage/' . $image->url) }}" alt="Work Order Image" class="responsive-img">
                        <label for="delete_image_{{ $image->id }}">
                            <input type="checkbox" id="delete_image_{{ $image->id }}" name="delete_images[]" value="{{ $image->id }}" />
                            <span>Delete</span>
                        </label>
                    </div>
                @endforeach
            </div>
        @else
            <p>No images associated with this work order.</p>
        @endif

        <button type="submit" class="btn">Update</button>
    </form>
@endsection