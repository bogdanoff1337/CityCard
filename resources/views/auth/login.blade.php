@extends('layout.app')

@section('content')
<div class="container">
<form action="{{ route('login') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="login" class="form-label">login</label>
        <input type="login" name="login" id="login" class="form-control form-control-lg" placeholder="login">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="password">
    </div>
    
    <button type="submit" class="btn btn-primary btn-lg">sing in</button>
</form>
<a href="/auth/register">already have profile?</a>
</div>


@endsection

