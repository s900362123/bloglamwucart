@extends('layouts.master')
@section('title', '首頁')
@section('content')
<div class="flex-center position-ref full-height">
      <div class="container">

          <div class="title m-b-md">
                歡迎來到</br>
             {{env('APP_NAME')}} 
          </div>
      </div>
</div>
@endsection
