@extends('layouts.student-layout')
@section('student-content-area')
  <h2 class="mb-4">All classes</h2> 


  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Class</th>
        <th scope="col">Show Subjects</th>
      </tr>
    </thead>
    <tbody>
        @if(count($classesList) > 0)
        @foreach($classesList as $class)
            <tr>
            <td>{{$class->id}}</td>
            <td>{{ $class->class}}</td>
            <td><a href="{{ route('subjects_Records', ['id' => $class->id]) }}" class="btn btn-sm btn-success">Show Subjects</a></td>
        </tr>
        @endforeach
        @else
        <tr>
        
        <td colspan="4"> <h1>no record</h1></td>
        </tr>
        @endif

        
                
         
    </tbody>
  </table>
 
@endsection