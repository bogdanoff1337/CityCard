@extends('layout.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-deck d-flex flex-row ">
                @foreach ($cards as $card)
                    <div class="card flex-fill mb-3  mt-2">
                        <div class="card-header">
                           # {{ $card->card_number }}

                           
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Ціна</h5>
                            <p class="card-text">{{ $card->transport->price }} UAH</p>
                        
                            <h5 class="card-title">Транспорт</h5>
                            <p class="card-text">
                                @if ($card->transport)
                                    {{ $card->transport->name }}
                                @else
                                    Coming Soon
                                @endif
                            </p>
                        
                            <h5 class="card-title">Тип</h5>
                            <p class="card-text">
                                @if ($card->type)
                                    {{ $card->type->name }}
                                @else
                                    Coming Soon
                                @endif
                            </p>
                        
                            <h5 class="card-title">Місто</h5>
                            <p class="card-text">
                                @if ($card->city)
                                    {{ $card->city->name }}
                                @else
                                    Coming Soon
                                @endif
                            </p>

                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection