<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\City;
use App\Models\Transport;
use App\Models\Type;
use App\Models\Card;
use App\Models\DebitHistory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function index() : RedirectResponse
    {
        $cities = City::all();
        $types = Type::all(); 
        $transport = Transport::all();
       

        if (Session::has('user') && Session::get('user')->role === 'admin') {

            return view('admin.dashboard',[
                'cities' => $cities,
                'types' => $types,
                'transports' => $transport,
            ]);
        } else {
            return redirect('home');
        }
    }

    public function createCity() : View
    {
        return view('admin.city.create');
    }

    public function storeCity(Request $request): RedirectResponse
    {
        $city = new City();
        $city->name = $request->input('name');
        $city->save();

        return redirect()->route('admin.dashboard');
    }

    public function destroyCity($cityid): RedirectResponse
    {

        $city = city::findOrFail($cityid);

        
        $cardsWithCity = Card::where('city_id', $city->id)->count();

        if ($cardsWithCity) {
            return redirect()->route('admin.dashboard')->with('error', 'Неможливо видалити місто, оскільки воно використовується в оформленій картці користувача.');
        }

        if (Session::has('user') && Session::get('user')->role === 'admin') {
            $city->delete();
    
            return redirect()->route('admin.dashboard');
        } else {
            return redirect('home');
        }
    }

    public function updateCityIndex($id): View
    {
        $city = City::find($id);

        return view('admin.city.update',[
            'city' => $city,
        ]);
    }

    public function updateCity(Request $request, int $id): RedirectResponse
    {
    // Отримуємо дані з форми
    $name = $request->input('name');

    // Знаходимо місто за його ідентифікатором
    $city = City::find($id);

    // Оновлюємо назву міста
    $city->name = $name;
    $city->update();

    // Перенаправляємо на сторінку індексу адміністраторської панелі
    return redirect()->route('admin.dashboard');
    }

    public function createType(): View
    {
        return view('admin.type.create');
    }

    public function storeType(Request $request): RedirectResponse
    {
        $ticketType = new Type();
        $ticketType->name = $request->input('name');
        
        $ticketType->save();
    
        return redirect()->route('admin.dashboard');
    }


    public function destroyType($typeId): RedirectResponse
    {

        $type = Type::findOrFail($typeId);

        $cardsWithtype = Card::where('city_id', $type->id)->count();

        if ($cardsWithtype) {
            return redirect()->route('admin.dashboard')->with('error', 'Неможливо видалити тип, оскільки він використовується в оформленій картці користувача.');
        }


        if (Session::has('user') && Session::get('user')->role === 'admin') {
            $type->delete();
    
            return redirect()->route('admin.dashboard');
        } else {
            return redirect('home');
        }
    }

    public function updateTypeIndex($id): View
    {
        $type = Type::find($id);

        return view('admin.type.update',[
            'type' => $type,
        ]);
    }

    public function updateType(Request $request, int $id): RedirectResponse
    {
    
    $name = $request->input('name');
    
   
    $type = Type::find($id);

    
    $type->name = $name;
    
    $type->update();

    // Перенаправляємо на сторінку індексу адміністраторської панелі
    return redirect()->route('admin.dashboard');
    }

    public function createTransport(): View
    {
        return view('admin.transport.create');
    }

    public function storeTransport(Request $request): RedirectResponse
    {
        $transport = new Transport();
        $transport->name = $request->input('name');
        $transport->price = $request->input('price');
        $transport->save();
    
        return redirect()->route('admin.dashboard');
    }

    public function updateTransportIndex($id) : View
    {
        $transport = Transport::find($id);

        return view('admin.transport.update',[
            'transport' => $transport,
        ]);
    }

    public function updateTransport(Request $request, int $id): RedirectResponse
{
    $name = $request->input('name');
    $price = $request->input('price');

    // Знайдіть поточний запис в таблиці transports
    $type = Transport::find($id);

    if ($type) {
        // Отримайте поточне значення price
        $currentPrice = $type->price;

        // Знайдіть всі записи в таблиці debit_history з посиланнями на старе значення price
        $debitHistoryRecords = DebitHistory::where('price', $currentPrice)->get();

        // Оновіть всі записи debit_history з новим значенням price
        foreach ($debitHistoryRecords as $record) {
            $record->price = $price;
            $record->save();
        }

        // Оновіть запис в таблиці transports
        $type->name = $name;
        $type->price = $price;
        $type->save();

        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('admin.dashboard')->with('error', 'Запис не знайдено');
    }
}


    public function destroyTransport($transportId): RedirectResponse
    {

        $transport = Transport::findOrFail($transportId);

        $cardsWithtransport = Card::where('city_id', $transport->id)->count();

        if ($cardsWithtransport) {
            return redirect()->route('admin.dashboard')->with('error', 'Неможливо видалити транспорт, оскільки він використовується в оформленій картці користувача.');
        }


        if (Session::has('user') && Session::get('user')->role === 'admin') {
            $transport->delete();
    
            return redirect()->route('admin.dashboard');
        } else {
            return redirect('home');
        }
    }



}
