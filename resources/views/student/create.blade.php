@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">

      <form action="{{ route('student.save') }}" method="post">
        @csrf
        <label>Name (in english)</label></br>
        <input type="text" name="name_en" id="name" class="form-control"></br>
        <label>الأسم</label></br>
        <input type="text" name="name_ar" id="name" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address_en" id="address" class="form-control"></br>
        <label>العنوان</label></br>
        <input type="text" name="address_ar" id="address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
