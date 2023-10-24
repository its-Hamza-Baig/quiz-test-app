@extends('layouts.student-layout')
@section('student-content-area')
  <h2 class="mb-4">Previous exams</h2> 

  
  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">exam name</th>
        <th scope="col">Total Marks</th>
        <th scope="col">Obtained Marks</th> 
        <th scope="col">Date</th>
        <th scope="col">Time</th>       
        <th scope="col">Review Exam</th>
      </tr>
    </thead>
    <tbody>
      @php
        $id = 1;
      @endphp
      @if(count($previousexams) > 0)
      {{-- {{$previousexams}} --}}
        @foreach($previousexams as $previousexam)
            
            <tr>
              <td>{{ $id++ }}</td>
              <td>{{ $previousexam['examdata']['exams_name'] }}<br></td>
              <td>{{ $previousexam['examdata']['total_marks'] }}<br></td>
              <td>{{ $previousexam->obt_marks}}</td>
              <td>{{ $previousexam['examdata']['date'] }}<br></td>
              <td>{{ $previousexam['examdata']['time'] }}<br></td>

              <td><a href="/review-exam/{{ $previousexams[0]['exam_id'] }}" class="btn btn-sm btn-success">Review</a></td>
            </tr>
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