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

                       $quantity = $quantity->quantity;
                   }//foreach

          $att['quantity'] = $quantity +1;

          Cart::where('user_id','=',auth()->user()->id)->where('product_id','=',$id)->update($att);

        }
          return redirect()->route('Category.index');
         //return redirect('/');
     }


    public function index(Request $request)
    {
      $total_sum=0;
      $cart=Cart::join('product', 'cart.product_id', '=', 'product.product_id')->where('user_id','=',auth()->user()->id)->get();
      $user=User::where('id','=',auth()->user()->id)->first();
      //echo Cart::join('product', 'cart.product_id', '=', 'product.product_id')->toSql();
      foreach ($cart as $total) {

                       $unit = $total->product_price;

                       $quantity = $total->quantity;

                       $multiplication=$unit*$quantity;

                       $total_sum=$total_sum+$multiplication;
                   }//foreach

      $data=[
        'cart_show'=>$cart,
        'total_sum'=>$total_sum,
        'user_info'=>$user,
      ];

      return view('cart.cart_comfirm',$data);
    }
    public function comfirm(Request $request)
    {
      $total_sum=0;
      $cart=Cart::join('product', 'cart.product_id', '=', 'product.product_id')->where('user_id','=',auth()->user()->id)->get();
      $user=User::where('id','=',auth()->user()->id)->first();
      //echo Cart::join('product', 'cart.product_id', '=', 'product.product_id')->toSql();
      foreach ($cart as $total) {

                       $unit = $total->product_price;

                       $quantity = $total->quantity;

                       $multiplication=$unit*$quantity;

                       $total_sum=$total_sum+$multiplication;
                   }//foreach

      $data=[
        'cart_show'=>$cart,
        'total_sum'=>$total_sum,
        'user_info'=>$user,
      ];

      return view('cart.cart_comfirm',$data);
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
    public function store()
    {
        //
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      //
      $cart=Cart::join('product', 'cart.product_id', '=', 'product.product_id')->where('user_id','=',auth()->user()->id)->get();

      //echo Cart::join('product', 'cart.product_id', '=', 'product.product_id')->toSql();
      $data=[
        'cart_show'=>$cart,
      ];

      return view('cart.index',$data);

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
    public function update(Request $request,$id)
    {
        //
        $att['quantity'] = $request->input('quantity'.$id);
        Cart::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $id)->update($att);
        return redirect()->route("cart.show");
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
        return redirect()->route("cart.show");
    }
}
