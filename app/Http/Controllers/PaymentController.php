<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Product;

class PaymentController extends Controller
{
    public function index(Payment $payment, $id)
    {
        $categories = Category::all()->sortBy('major_category_name');

        $major_category_names = Category::pluck('major_category_name')->unique();

        if(Auth::user()) {
            return view('web.index', compact('major_category_names', 'categories'));
        } else {
            return view('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
  
        $payments = Payment::all()->where('product_id', $id);

        return view('payments.create', compact('payments', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payments = new Payment();
        $payments->price = $request->input('price');
        $payments->deposit = $request->input('deposit');
        $payments->product_id = $request->input('product_id');
        $payments->user_id = $request->input('user_id');

        $payments->save();

        return redirect()->route('payments.show', $payments->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $payments = Payment::all()->where('user_id', $user_id);
dd($user_id);
        return view('payments.show', compact('payments'));
    }

}
