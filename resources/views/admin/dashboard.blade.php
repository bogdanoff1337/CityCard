@extends('layout.app')

@section('content')

<div class="container">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="cities-tab" data-toggle="tab" href="#cities" role="tab" aria-controls="cities" aria-selected="true">Міста</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ticket-types-tab" data-toggle="tab" href="#ticket-types" role="tab" aria-controls="ticket-types" aria-selected="false">Типи квитків</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="transport-tab" data-toggle="tab" href="#transport" role of="tab" aria-controls="transport" aria-selected="false">Транспорт</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <form action="{{ route('admin.search') }}" method="GET" class="form-inline mb-2">
            <div class="form-group mr-2">
                <label for="search">Пошук за ім'ям:</label>
                <input type="text" name="search" class="form-control" value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn-3d">Пошук</button>
        </form>

        <div class="tab-pane fade show active" id="cities" role="tabpanel" aria-labelledby="cities-tab">
            <h2>Міста</h2>
            <a href="{{ route('admin.city.create') }}" class="btn-3d">Додати місто</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назва</th>
                        <th>Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                            <td>
                                <a href="{{ route('admin.city.index', ['id' => $city->id]) }}" class="btn btn-sm btn-info">Редагувати</a>
                                <form action="{{ route('admin.city.delete', ['id' => $city->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Видалити</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="ticket-types" role="tabpanel" aria-labelledby="ticket-types-tab">
            <h2>Типи квитків</h2>
            <a href="{{ route('admin.type.create')}}" class="btn-3d">Додати тип квитка</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назва</th>

                        <th>Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>

                            <td>
                                <a href="{{ route('admin.type.update', ['id' => $type->id]) }}" class="btn btn-sm btn-info">Редагувати</a>
                                <form action="{{ route('admin.type.delete', ['id' => $type->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Видалити</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="transport" role="tabpanel" aria-labelledby="transport-tab">
            <h2>Транспорт</h2>
    <a href="{{ route('admin.transport.create')}}" class="btn-3d">Додати транспорт</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>Ціна</th>
                <th>Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transports as $transport)
                <tr>
                    <td>{{ $transport->id }}</td>
                    <td>{{ $transport->name }}</td>
                    <td>{{ $transport->price }}</td>
                    <td>
                        <a href="{{ route('admin.transport.index', ['id' => $transport->id]) }}" class="btn btn-sm btn-info">Редагувати</a>
                        <form action="{{ route('admin.transport.delete', ['id' => $transport->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.nav-link');

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function (event) {
                event.preventDefault();

                // Знаходимо активний навігаційний пункт та активний вміст
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

@endsection
