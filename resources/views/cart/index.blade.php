@extends('layouts.master')
@section('title', 'Cart')
@section('content')
<div class="container">




    <table class="table table-striped ">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">產品名稱</th>
          <th scope="col">產品單價</th>
          <th scope="col">數量</th>
          <th scope="col">總價</th>
          <th scope="col">修改/移除</th>
        </tr>
      </thead>
      <tbody>


        @foreach ($cart_show as $cart_show_num =>$cart_list )

          <tr>

            <th scope="row">{{$cart_show_num+1}}</th>
            <td>{{$cart_list->product_name}}</td>
            <td>{{$cart_list->product_price}}</td>
            <td>
              <form id="update{{$cart_show_num+1}}" method="get" action="{{url('Cart_update/'.$cart_list->product_id)}}" >
                @csrf
                <input type="number" id ="quantity"class="form-control mx-sm-1 mb-1" min="1" max="10" name ="quantity{{$cart_list->product_id}}" value="{{$cart_list->quantity}}">
              </form>

            </td>
            <td>{{$cart_list->product_price*$cart_list->quantity}}</td>
            <td>

            <a href="#" class="btn btn-primary mb-2"onclick="document.getElementById('update{{$cart_show_num+1}}').submit()">修改</a>
            <a href="#" class="btn btn-danger mb-2" onclick="document.getElementById('delete{{$cart_show_num+1}}').submit()">移除</a>

            <form id="delete{{$cart_show_num+1}}" method="POST" action="{{route('cart.destroy',$cart_list->product_id)}}" >
              @csrf
              {{ method_field('DELETE') }}
            </form>

            </td>

          </tr>

        @endforeach

      </tbody>
    </table>



<button type="button" class="btn btn-success mb-2" onclick="window.location='{{route('cart.comfirm')}}'" >送出訂單</button>
@endsection
