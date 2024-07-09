@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">


        <div class="card-body">
        <h5 class="card-title">Name : {{ $students->name_en }}</h5>
        <h5 class="card-title">الاسم : {{ $students->name_ar }}</h5>
        <p class="card-text">Address : {{ $students->address_en }}</p>
        <p class="card-text"> العنوان : {{ $students->address_ar }}</p>
        <p class="card-text">Mobile : {{ $students->mobile }}</p>
  </div>

    </hr>

  </div>
</div>
@endsection
