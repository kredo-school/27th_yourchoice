<?php

namespace App\Http\Controllers;

// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // 支払い一覧を表示
    public function index()
    {
        $payments = Payment::all();// 支払い情報をすべて取得
        return view('payments.index', compact('payments'));// ビューにデータを渡す
    }

    // 支払いの作成フォームを表示
    public function create()
    {
        return view('payments.create');// 新規作成用のフォームビューを表示
    }

    // 支払いを保存
    public function store(Request $request)
    {
        $validated = $request->validate([
        'payment_date' => 'required|date', // 日付必須
        'amount' => 'required|numeric|min:0', // 金額必須、0以上
        'payment_method' => 'required|in:credit_card,paypal,bank_transfer', // 支払い方法
        'status' => 'required|in:pending,completed,failed', // 状態

        
        ]);

        Payment::create($validated); // データをデータベースに保存

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
        

        $payment = Payment::create([
            'user_id' => $request->input('user_id'), // ユーザーID
            'amount' => $request->input('amount'),  // 支払い金額
            'payment_method' => $request->input('payment_method'), // 支払い方法
            'status' => 'pending', // 初期ステータス
        ]);
        
        $paymentId = $payment->id; // 生成されたIDを取得
        
    }

    // 支払いの詳細を表示
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment')); // 詳細ビューを表示
    }

    // 支払いの編集フォームを表示
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment')); // 編集フォームビューを表示
    }

    // 支払いを更新
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
            'status' => 'required|in:pending,completed,failed',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    // 支払いを削除
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }

    
}
