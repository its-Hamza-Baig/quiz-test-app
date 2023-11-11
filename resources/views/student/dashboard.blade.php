@extends('layouts.student-layout')
@section('student-content-area')
  <h2 class="mb-4">Student dashboard</h2> 

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
            <form action="/student/photo" method="post" enctype="multipart/form-data">
              @csrf
              <input type="file" name="photo" id="photo">
              <input type="submit" value="Submit" name="submit" class="btn btn-success btn-sm">
            
            </form>
          </div>
        </div>
      </div>
  
      <div class="col-6">
        <div class="detail">
          <h1><i style="font-family: serif; text-transform: capitalize" >{{ auth()->user()->username }}</i></h1><hr>
          <h4 style="font-family: serif; text-transform: capitalize" >Email:  {{ auth()->user()->email }}</h4>
        </div>
      </div>
    </div><hr>

</div>
</div>





  @if(count($classesList) > 0)
  @foreach ($classesList as $class)
  <label for=""> <h3 style="color: rgb(160, 157, 157)">Class: {{ $class->class }}</h3></label><br><br>

  <h2 style="color: rgb(160, 157, 157)">Subjects </h2>
  <table class="">
    <thead>
      <th class="col-2"></th>
      <th class="col-2"></th>
    </thead>
    <tbody>
  <tr>
  @foreach($class->subjects as $subject)

  
    <td><h3 style="color: rgb(160, 157, 157)"> {{ $subject->subject }}</h3></td>
 

  
  @endforeach
</tr></tbody> </table>


      
  @endforeach
  @endif
@endsection