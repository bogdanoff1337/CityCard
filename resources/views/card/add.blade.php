@extends('layout.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-plus"></i>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('cards.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="transport" class="form-label">Транспорт і ціна</label>
                                <select name="transport_id" id="transport_id" class="form-control form-control-lg">
                                    @foreach ($transports as $transpor)
                                        <option value="{{ $transpor->id }}">{{ $transpor->name }} - {{ $transpor->price }} UAH</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="type" class="form-label">Тип</label>
                                <select name="type_id" id="type_id" class="form-control form-control-lg">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="mb-3">
                                <label for="city" class="form-label">Місто</label>
                                <select name="city_id" id="city_id" class="form-control form-control-lg">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            

                            <button type="submit" class="btn btn-primary">Додати</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
