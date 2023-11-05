@extends('layout.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Додати місто</div>
                <div class="card-body">
                    <form action="{{ route('admin.store.city') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Назва міста</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Додати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
