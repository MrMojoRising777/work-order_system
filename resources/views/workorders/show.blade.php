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
        <h2 class="center-align">Images:</h2>
        <div class="carousel">
            @foreach ($workOrder->images as $image)
                <a class="carousel-item">
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $image->url) }}" alt="Work Order Image" class="responsive-img">
                    </div>
                </a>
            @endforeach
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var elems = document.querySelectorAll('.carousel');
                var instances = M.Carousel.init(elems, {
                    // Options for carousel
                });
            });
        </script>
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

<style>
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        width: 200px;
        overflow: hidden;
    }

    .image-container img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
    }
</style>