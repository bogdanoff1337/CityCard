@extends('layout.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update type</div>
                <div class="card-body">
                    <form action="{{ route('admin.type.update', ['id' => $type->id]) }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Назва типу</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg" required value="{{ $type->name }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Оновити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
