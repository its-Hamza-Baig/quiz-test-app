@extends('layouts.student-layout')
@section('student-content-area')
  <h2 class="mb-4">Student dashboard</h2> 

  {{-- @if(count($classesList) > 0)
{{ $classesList }}
  @foreach ($classesList as $class)
  <label for=""> Your Class Name Is: {{ $class->class }}</label><br><br>

  <h3>Subjects</h3>

  <label for="">{{ $class->subjects[0]['subject'] }}</label> --}}


  
  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Subject Name</th>
        <th scope="col">Class Name</th>        
        {{-- <th scope="col">Show Subjects</th> --}}
      </tr>
    </thead>
    <tbody>
      @php
        $id = 1;
      @endphp
      @if(count($classesList) > 0)
        @foreach($classesList as $class)
          @foreach($class->subjects as $subject)
            <tr>
              <td>{{$id++}}</td>
              <td>{{ $subject->subject }}<br></td>
              <td>{{ $class->class}}</td>
              {{-- <td><a href="{{ route('subjects_Records', ['id' => $class->id]) }}" class="btn btn-sm btn-success">Show Subjects</a></td> --}}
            </tr>
          @endforeach
        @endforeach
      @else
      <tr>
      
      <td colspan="3"> <h1>no record</h1></td>
      </tr>
      @endif

        
                
         
    </tbody>
  </table>



      
  {{-- @endforeach
  @endif --}}
@endsection