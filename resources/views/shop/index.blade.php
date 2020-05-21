@extends('layouts.master')
@section('title', 'Product')
@section('content')
<div class="container">


  <div class="card-deck">

    @foreach ($product_list as $product_list_sum =>$products)



      <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$products->product_name}}</h5>
          <p class="card-text">價格：{{$products->product_price}}&nbsp元</p>
          <p class="card-text">{{$products->description}}</p>
          <a href="{{route('cart.tmp',$products->product_id)}}" class="btn btn-primary">add Cart</a>
        </div>
      </div>

    @endforeach

  </div>
  {{ $product_list->links() }}




</div>
@endsection
