@extends('layouts.app')

@section('content')

<div class="box">
    <h2>{{ $item['name'] }}</h2>

    <img src="{{ asset($item['image']) }}" width="150" alt="Candidate">

    <p>Position: {{ $item['position'] }}</p>
    <p>Party: {{ $item['party'] }}</p>
    <p>Platform: {{ $item['platform'] }}</p>

    <form method="POST" action="/vote/{{ $item['id'] }}">
        @csrf
        <button>Vote</button>
    </form>
</div>

@endsection
