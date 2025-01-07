<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReserveController extends Controller
{
    public function edit()
    {
        return view('customers.reservations.reservation');
    }

    public function show()
    {
        return view('customers.reservations.reservation_detail');
    }

    public function confirmation()
    {
        return view('customers.reservations.reserved_confirmation');
    }

    public function postReservation(Request $request)
{
    // データをバリデーション
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
    ]);

    // 次のページにデータを渡す
    return view('customers.reservations.reserve.show', [
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
    ]);
}

public function showReservationDetail(Request $request)
{   
    // 例: POSTリクエストから値を取得
    $first_name = $request->input('first_name');

    // 値を確認
    dd($first_name);

    // Bladeに値を渡す
    return view('reservation_detail', [
        'first_name' => $first_name, // Bladeに値を渡す
    ]);
}


public function showReservationForm()
{
    $first_name = 'John'; // 任意の値をセット

    return view('reservation', compact('first_name'));
}

public function storeReservationData(Request $request)
{
    $validated = $request->validate([
        'first-name' => 'required|string|max:255',
    ]);

    // セッションに保存
    $request->session()->put('first_name', $validated['first-name']);

    return redirect()->route('reservation_detail'); // 次のページにリダイレクト
}

public function store(Request $request)
{
    // セッションにデータを保存
    $request->session()->put('first_name', $request->input('first_name'));
    $request->session()->put('last_name', $request->input('last_name'));
    $request->session()->put('reservation_email', $request->input('reservation_email'));
    $request->session()->put('reservation_phone', $request->input('reservation_phone'));

    // 次のページへリダイレクト
    return redirect()->route('customer.reserve.show');
}

public function reserveShow(Request $request)
{
    // セッションデータを取得
    $data = [
        'first_name' => $request->session()->get('first_name'),
        'last_name' => $request->session()->get('last_name'),
        'reservation_email' => $request->session()->get('reservation_email'),
        'reservation_phone' => $request->session()->get('reservation_phone'),
    ];

    return view('customer.reserve', $data);
}




    
}
