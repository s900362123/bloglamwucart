@extends('layouts.master')
@section('title', 'Cart')
@section('content')
<div class="container">



<form method="POST" action="">
 @csrf
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
                <select id="{{$cart_list->product_id}}" name="quantity"class="custom-select col-sm-5" required>
                  <option @if($cart_list->quantity=='1') selected @endif value="1">1</option>
                  <option @if($cart_list->quantity=='2') selected @endif value="2">2</option>
                  <option @if($cart_list->quantity=='3') selected @endif value="3">3</option>
                  <option @if($cart_list->quantity=='4') selected @endif value="4">4</option>
                  <option @if($cart_list->quantity=='5') selected @endif value="5">5</option>
                </select>
            </td>
            <td>{{$cart_list->product_price*$cart_list->quantity}}</td>
            <td><button type="button" class="btn btn-primary mb-2" onclick="document.getElementById('');">修改</button>
            <a href="#" class="btn btn-danger mb-2" onclick="document.getElementById('delete{{$cart_show_num+1}}').submit()">移除</a></td>
            <form id="delete{{$cart_show_num+1}}" method="POST" action="{{route('cart.destroy',$cart_list->product_id)}}" >
              @csrf
              {{ method_field('DELETE') }}
            </form>


          </tr>

        @endforeach

      </tbody>
    </table>


</form>
<button type="submit" class="btn btn-success mb-2">Submit</button>
@endsection
