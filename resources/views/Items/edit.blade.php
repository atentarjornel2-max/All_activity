@extends('layouts.app')

@section('content')

<h2>Edit Candidate</h2>

<div class="box">

<form method="POST" action="/items/{{ $item['id'] }}/update" enctype="multipart/form-data">
@csrf

<input type="text" name="name" value="{{ $item['name'] }}" required>

<select name="position">
    <option {{ $item['position'] == 'President' ? 'selected' : '' }}>President</option>
    <option {{ $item['position'] == 'Vice president' ? 'selected' : '' }}>Vice President</option>
    <option {{ $item['position'] == 'Secretary' ? 'selected' : '' }}>Secretary</option>
</select>

<input type="text" name="party" value="{{ $item['party'] }}" required>

<textarea name="platform">{{ $item['platform'] }}</textarea>

<p>Current Image:</p>
<img src="{{ asset($item['image']) }}" width="120" alt="Candidate">

<input type="file" name="image">

<button>Update</button>
</form>

</div>

@endsection
