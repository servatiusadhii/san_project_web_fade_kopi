<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\Ratings;
use App\Transaction;
use App\Voucher;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user','ratings'])->where('slug', $id)->firstOrFail();

        return view('pages.detail', [
            'product' => $product
        ]);
    }

    public function add(Request $request, $id)
    {
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
    public function store(Request $request)
    {
        $data = [
            'products_id' => $request->product_id,
            'usersId' => Auth::user()->id,
            'rate' =>  $request->rate,
            'create_at'=> date('Y-m-d H:i:s'),
            'update_at'=> null,
        ];
        Ratings::create($data);
        $voucher = new Voucher;
        $voucher->voucher = Str::random(5);
        $voucher->user_id = Auth::user()->id;
        $voucher->exp= date('Y-m-d');
        $voucher->save();
       
        return back();
    }
    public function update(Request $request, $id)
    {
        Ratings::where('id', $id)
        ->update([
                'rate' => $request->rate,
                
        ]);
        return back();
    }
}
