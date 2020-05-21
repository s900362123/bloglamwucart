<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use App\Product;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function tmp($id)
     {
         //
         if(cart::where('user_id','=',auth()->user()->id)->where('product_id','=',$id)->get()->count()=='0'){
          $att['user_id'] = auth()->user()->id;
          $att['product_id'] = $id;
          $att['quantity'] = 1;

          Cart::create($att);
        }
        else{
          $cart_add=cart::where('user_id','=',auth()->user()->id)->where('product_id','=',$id)->get();
                  foreach ($cart_add as $quantity) {
                       //讀出使用者每日單字資料
                       $quantity = $quantity->quantity;
                   }//foreach

          $att['quantity'] = $quantity +1;

          Cart::where('user_id','=',auth()->user()->id)->where('product_id','=',$id)->update($att);

        }
          return redirect('/');
         //return redirect('/');
     }


    public function index()
    {
        //
        $cart=Cart::join('product', 'cart.product_id', '=', 'product.product_id')->where('user_id','=',auth()->user()->id)->get();
      //
        //echo Cart::join('product', 'cart.product_id', '=', 'product.product_id')->toSql();
        $data=[
          'cart_show'=>$cart,
        ];

        return view('cart.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cart::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->delete();
        return redirect()->route("cart.index");
    }
}
