@extends('layouts.app')

@section('content')

<h2>Add Candidate</h2>

<div class="box">

<form method="POST" action="/add" enctype="multipart/form-data">
@csrf

<input type="text" name="name" placeholder="Name" required>

<select name="position">
    <option>President</option>
    <option>Vice President</option>
    <option>Secretary</option>
</select>

<input type="text" name="party" placeholder="Party" required>

<textarea name="platform" placeholder="Platform"></textarea>

<input type="file" name="image">

<button>Add</button>
</form>

</div>

@endsection
