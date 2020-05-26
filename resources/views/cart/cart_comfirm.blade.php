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
        </tr>
      </thead>
      <tbody>


        @foreach ($cart_show as $cart_show_num =>$cart_list )

          <tr>

            <th scope="row">{{$cart_show_num+1}}</th>
            <td>{{$cart_list->product_name}}</td>
            <td>{{$cart_list->product_price}}</td>
            <td>{{$cart_list->quantity}}</td>
            <td>{{$cart_list->product_price*$cart_list->quantity}}</td>


          </tr>

        @endforeach
        <tr>
          <td colspan="4">合計</td>
          <td colspan="1">{{$total_sum}}</td>

        </tr>

      </tbody>
    </table>

        <form method="post" action="{{route('order.store')}}">
        @csrf

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$user_info->name}}">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user_info->email}}">
          </div>
          <div class="form-group col-md-4">
            <label for="phone">Phone</label>
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$user_info->phone}}">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address"  name="address" placeholder="Address" value="{{$user_info->addr}}">
            </div>
            <div class="form-group col-md-4">
              <label for="payment_method">payment method</label>
              <select id="payment_method" name="payment_method"class="form-control">
                <option selected value="1">Credit Card</option>
                <option value="2">Paypal</option>
              </select>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">結帳</button>
      </form>


@endsection
