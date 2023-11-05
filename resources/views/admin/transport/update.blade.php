@extends('layout.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Оновити Транспорт</div>
                <div class="card-body">
                    <form action="{{ route('admin.transport.update', ['id' => $transport->id]) }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Назва транспорту</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg" required value="{{ $transport->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Ціна проїзду</label>
                            <input type="text" name="price" id="price" class="form-control form-control-lg" required value="{{ $transport->price }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Оновити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection