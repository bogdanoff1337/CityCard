@extends('layout.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">update city</div>
                <div class="card-body">
                    <form action="{{ route('admin.city.update', ['id' => $city->id]) }}" method="post">
                        @csrf
                    
                        <div class="mb-3">
                            <label for="name" class="form-label">Назва міста</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg" required value="{{$city->name}}">
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Оновити</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection