@extends('layout.app')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="cardTabs" role="tablist">
        @foreach ($cards as $card)
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="card{{ $card->id }}-tab" data-toggle="tab" href="#card{{ $card->id }}" role="tab" aria-controls="card{{ $card->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">Карта № {{ $card->card_number }}</a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content" id="cardTabsContent">
        @foreach ($cards as $card)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="card{{ $card->id }}" role="tabpanel" aria-labelledby="card{{ $card->id }}-tab">
                <h2>Карта № {{ $card->card_number }}</h2>
                
                <h3>Операції:</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Тип</th>
                            <th>Сума</th>
                            <th>Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $combinedOperations = array_merge($card->creditOperations->toArray(), $card->debitOperations->toArray());
                            usort($combinedOperations, function ($a, $b) {
                                return strtotime($b['created_at']) - strtotime($a['created_at']);
                            });
                        @endphp

                        @foreach ($combinedOperations as $operation)
                            <tr class="@if($operation['type'] === 'зарахування') table-success @else table-danger @endif">
                                <td>{{ $operation['type'] }}</td>
                                <td>{{ $operation['type'] === 'зарахування' ? $operation['amount_in'] : $operation['price'] }}</td>
                                <td>{{ date('Y-m-d H:i:s', strtotime($operation['created_at'])) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.nav-link');

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function (event) {
                event.preventDefault();

                const activeNavLink = document.querySelector('.nav-link.active');
                const activeTabPane = document.querySelector('.tab-pane.fade.show.active');

                if (activeNavLink) {
                    activeNavLink.classList.remove('active');
                }

                if (activeTabPane) {
                    activeTabPane.classList.remove('show', 'active');
                }

                this.classList.add('active');
                const targetTabPane = document.querySelector(this.getAttribute('href'));

                if (targetTabPane) {
                    targetTabPane.classList.add('show', 'active');
                }
            });
        });
    });
</script>
</div>
</div>
@endsection
