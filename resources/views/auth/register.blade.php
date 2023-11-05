@extends('layout.app')

@section('content')
<div class="container">
<form action="{{ route('register') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="login" class="form-label">login</label>
        <input type="text" name="login" id="login" class="form-control form-control-lg" placeholder="login">
    </div>
    
    <div class="mb-3">
        <label for="phone" class="form-label">phone</label>
        <input type="phone" name="phone" id="phone" class="form-control form-control-lg" placeholder="phone">
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="password">
    </div>
    
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" placeholder="password">
    </div>
    
    
    <button type="submit" class="btn btn-primary btn-lg">sing up</button>
</form>
<a href="/auth/login">already have profile?</a>
</div>


@endsection

