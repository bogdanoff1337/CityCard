<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Http\RedirectResponse;
use App\Models\City;

use App\Models\CreditHistory;

use App\Models\DebitHistory;
use App\Models\Transport;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{

    public function index(): View
    {
        $user = Session::get('user');
    
        if (!$user) {
            return redirect()->route('auth.login');
        }
    
        $userId = $user->id;

        $cards = Card::where('user_id', $userId)->get();
    
        // Повертаємо картки в шаблон
        return view('card.index', [
            'cards' => $cards,
        ]);
    }
    
    

    public function CardFormShow() : View
    {  
        $cities = City::all();
        $types = Type::all(); 
        $transport = Transport::all(); 

        return view('card.add', [
            'cities' => $cities,
            'types' => $types,
            'transports' => $transport,
        ]);
    }

       
 

    
    public function store(Request $request): RedirectResponse
{
    // Перевірка, чи користувач є в сесії
    if (Session::has('user')) {
        // Отримуємо ID користувача з сесії
        $user = Session::get('user');
        $user_id = $user->id;

        // Перевірка кількості карток користувача
        $userCardCount = Card::where('user_id', $user_id)->count();
        if ($userCardCount >= 3) {
            return redirect()->route('home')->with('error', 'Ви не можете мати більше трьох карток.');
        }

        // Отримання даних про картку, яка додається
        $cityId = $request->input('city_id');
        $typeId = $request->input('type_id');
        $transportId = $request->input('transport_id'); // Отримуємо transport_id з форми

        // Отримуємо назву міста за його city_id
        $city = City::find($cityId);
        if (!$city) {
            return redirect()->route('home')->with('error', 'Обране місто не існує.');
        }
        
        $type = Type::find($typeId);
        if (!$type) {
            return redirect()->route('home')->with('error', 'Обраний тип не існує.');
        }

        $transport = Transport::find($transportId);
        if (!$transport) {
            return redirect()->route('home')->with('error', 'Обраний тип не існує.');
        }

        // Створення нового запису у таблиці cards для поточного користувача
        $card = new Card;
        $card->card_number = random_int(100000000, 999999999);
        $card->city_id = $cityId;
        $card->type_id = $typeId;
        $card->transport_id = $transportId;
        $card->user_id = $user_id;

        $card->save();

        return redirect()->route('home')->with('success', 'Картка успішно додана.');
    } else {
        return redirect()->route('login')->with('error', 'Будь ласка, увійдіть, щоб додати картку.');
    }
}



    public function destroy($id): RedirectResponse
    {
    // Знайдіть картку за ID і перевірте, чи вона належить поточному користувачеві
    $card = Card::findOrFail($id);
    
    if ($card) {
        $card->delete();
        return redirect()->route('home')->with('success', 'Картка була успішно видалена.');
    } else {
        return redirect()->route('home')->with('error', 'Ви не маєте прав на видалення цієї картки.');
    }
    }


    

    public function showPaymentOperations() : View
    {
        $user = Session::get('user');
    
        if (!$user) {
            return redirect()->route('auth.login');
        }
    
        $userId = $user->id;
    
        $cards = Card::where('user_id', $userId)->get();
    
        //  операції з таблиць credit_history та debit_history
        foreach ($cards as $card) {
            $card->creditOperations = CreditHistory::where('card_id', $card->id)->get();
            $card->debitOperations = DebitHistory::where('card_id', $card->id)->get();
        }
    
        // Поверніть картки разом з операційними даними в шаблон
        return view('card.payment.index', [
            'cards' => $cards,
        ]);
    }
    



    
    
}








