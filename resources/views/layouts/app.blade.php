<!DOCTYPE html>
<html>
<head>
    <title>Voting System</title>
    <style>
        body { font-family: Arial; text-align: center; }
        .box { border:1px solid #ccc; margin:10px auto; padding:15px; width:50%; }
        input, textarea, select { width:90%; padding:8px; margin:5px; }
        button { padding:8px 12px; margin:5px; cursor:pointer; }
        .success { color:green; }
        img { margin-bottom:5px; }
    </style>
</head>
<body>

<h1>Voting System</h1>

@if(session('success'))
<p class="success">{{ session('success') }}</p>
@endif

<hr>

<a href="/items">Home</a> |
<a href="/add">Add Candidate</a>

@yield('content')

</body>
</html>
