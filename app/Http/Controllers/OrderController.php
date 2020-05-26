<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use App\Product;
use App\order;
use App\order_detail;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $order=order::orderby('date','DESC')->where('custom_id','=',auth()->user()->id)->get();
          $data=[
            'order_list'=>$order,

          ];
          return view('order.index',$data);
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
        //$cart=Cart::where('user_id','=',auth()->user()->id)->get();
      //  dd($cart);

      $total_sum=0;
      $order_detail=[];

      $att['date']=now();
      $att['total']=99999;
      $att['deliveryfee']=0;
      $att['custom_id'] = auth()->user()->id;
      $att['custom_addr'] = $request->input('address');
      $att['custom_email'] = $request->input('email');
      $att['custom_phone'] = $request->input('phone');
      $att['paytype'] = $request->input('payment_method');
      $GETID= order::insertGetId($att);

      $cart=Cart::join('product', 'cart.product_id', '=', 'product.product_id')->where('user_id','=',auth()->user()->id)->get();

      foreach ($cart as $total) {

                       $unit = $total->product_price;

                       $quantity = $total->quantity;

                       $multiplication=$unit*$quantity;


                       $total_sum=$total_sum+$multiplication;

                       $order_detail[]=[
                        'order_id'=>$GETID,
                        'product_id'=>$total->product_id,
                        'product_name'=>$total->product_name,
                        'unitproce'=>$total->product_price,
                        'quantity'=>$total->quantity,
                        'total'=>$multiplication,

                       ];



                   }//foreach
                   //dd($order_detail);
                   $att['total']=$total_sum;
                   order::where('order_id','=',$GETID)->update($att);
                   order_detail::insert($order_detail);
                   Cart::where('user_id','=',auth()->user()->id)->delete();

                     return redirect()->route('Category.index');




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
        //SELECT order_detail.order_id as order_id,order.custom_id as uid,order_detail.product_id,product.product_name as product_name, order_detail.unitproce as unitproce,order_detail.quantity as quantity,order_detail.total as total,order.total as total_sum FROM `order_detail` left join `order` on order.order_id=order_detail.order_id
        //left join product on  product.product_id=order_detail.product_id
        $order_detail=order_detail::select('order_detail.order_id as order_id','order.custom_id as custom_id','order_detail.product_id','product.product_name as product_name','order_detail.unitproce as unitproce','order_detail.quantity as quantity','order_detail.total as total','order.total as total_sum')->join('order', 'order.order_id', '=', 'order_detail.order_id')->join('product', 'order_detail.product_id', '=', 'product.product_id')-> where('order_detail.order_id','=',$id)->get();

//->where('custom_id','=',auth()->user()->id)

        foreach ($order_detail as $uid) {
           //
           $userid= $uid->custom_id;

        }//foreach

        if($userid!=auth()->user()->id){
          echo "<script>alert('無權訪問他人訂單');window.history.back();</script>";
        }
        $data=[
          'order_detail'=>$order_detail,
        ];


        return view('order.detail',$data);

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
    }
}
