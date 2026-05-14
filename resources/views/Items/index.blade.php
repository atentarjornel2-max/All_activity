@extends('layouts.app')

@section('content')

<h2>Categories</h2>

@foreach ($grouped as $position => $candidates)
<div class="box">

    <h3>{{ $position }}</h3>

    @foreach ($candidates as $item)
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:10px;">
            <div>
                <img src="{{ asset($item['image']) }}" width="80" alt="Candidate">
                <a href="/items/{{ $item['id'] }}">{{ $item['name'] }}</a>
            </div>
            <div>
                <a href="/items/{{ $item['id'] }}/edit"><button>Edit</button></a>
                <form method="POST" action="/items/{{ $item['id'] }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

</div>
@endforeach

@endsection
