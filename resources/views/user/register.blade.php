@extends('template')

@section('content')

<style>
    form {
        width: 600px;
        margin: 0 auto;
    }
</style>

<form action="/register" method="POST">
    @csrf()
    
    @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Register</h1>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password confirmation</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop