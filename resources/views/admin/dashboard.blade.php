@extends('layouts.admin-layout')
@section('admin-content-area')
  <h2 class="mb-4 ">Admin Dashboard</h2>  

  <div class="container">
    <div class="admincontainer">
    <div class="row">
      <div class="col-6">
        <div class="profileImg">
          @if(count($photo) > 0)
          @foreach ($photo as $img)
          <img src="{{ asset('storage/images/'. $img->name)}}" alt="">
              
          @endforeach
          @endif
          <div class="photoupload mt-4">
            <form action="/photo" method="post" enctype="multipart/form-data">
              @csrf
              <input type="file" name="photo" id="photo">
              <input type="submit" value="Submit" name="submit" class="btn btn-success btn-sm">
            
            </form>
          </div>
        </div>
      </div>
  
      <div class="col-6">
        <div class="detail">
          <h1><i style="font-family: serif; text-transform: capitalize" >{{auth()->user()->username}}</i></h1><hr>
          <h4 style="font-family: serif; text-transform: capitalize" >Email:  {{auth()->user()->email}}</h4>
        </div>
      </div>
    </div><hr>
    




</div>
</div>
@endsection