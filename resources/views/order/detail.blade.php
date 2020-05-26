@extends('layouts.master')
@section('title', 'order detail')
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


        @foreach ($order_detail as $order_detail_num =>$order_detail_list )

          <tr>

            <th scope="row">{{$order_detail_num+1}}</th>
            <td>{{$order_detail_list->product_name}}</td>
            <td>{{$order_detail_list->unitproce}}</td>
            <td>{{$order_detail_list->quantity}} </td>
            <td>{{$order_detail_list->total}}</td>
          </tr>

        @endforeach
        <tr>
          <td colspan="4">合計</td>
          <td colspan="1">{{$order_detail_list->total_sum}}</td>

        </tr>

      </tbody>
    </table>




@endsection
