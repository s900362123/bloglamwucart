@extends('layouts.master')
@section('title', 'Order list')
@section('content')
<div class="container">




    <table class="table table-striped ">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">訂單編號</th>
          <th scope="col">date</th>
          <th scope="col">總價</th>
          <th scope="col">detail</th>
        </tr>
      </thead>
      <tbody>


        @foreach ($order_list as $order_show_num =>$order )

          <tr>

            <th scope="row">{{$order_show_num+1}}</th>
            <td>{{$order->order_id}}</td>
            <td>{{$order->date}}</td>
            <td>{{$order->total}}</td>
            <td><button type="button" class="btn btn-primary" onclick="window.location='{{route("order.show",$order->order_id)}}'">detail</button></td>


          </tr>

        @endforeach


      </tbody>
    </table>




@endsection
