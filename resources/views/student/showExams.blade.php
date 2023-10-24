{{-- @extends('layouts.student-layout')
@section('student-content-area')
  <h2 class="mb-4">All Exams</h2> 
  <h5>
{{$resultexam}}</h5>

  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Exam Name</th>
        <th scope="col">Subject Name</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Attampt Time</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if(count($examdata) > 0)
        @foreach($examdata as $exam)
            <tr>
            <td>{{$exam->id}}</td>
            <td>{{ $exam->exams_name}}</td>
            <td>{{ $exam['subjects'][0]['subject']}}</td>
            <td>{{ $exam->date}}</td>
            <td>{{ $exam->time}}</td>
            <td><a href="{{ route('attemptExams', ['id' => $exam->id]) }}" class="btn btn-sm btn-success">Attempt Quiz</a></td>
        </tr>
        @endforeach
        @else
        <tr>
        
        <td colspan="4"> <h1>no record</h1></td>
        </tr>
        @endif

        
                
         
    </tbody>
  </table>
 
@endsection --}}

@extends('layouts.student-layout')
@section('student-content-area')
  <h2 class="mb-4">Available exams</h2> 

  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">exam name</th>
        <th scope="col">Total Marks</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>       
        <th scope="col">Attempt Exam</th>
      </tr>
    </thead>
    <tbody>
      @if(count($exams) > 0)
        @foreach($exams as $exam)
          <tr>
            <td>{{ $exam->id }}</td>
            <td>{{ $exam->exams_name }}</td>
            <td>{{ $exam->total_marks }}</td>
            <td>{{ $exam->date }}</td>
            <td>{{ $exam->time }}</td>
            <td><a href="/attempt-exam/{{ $exam->id }}" class="btn btn-sm btn-primary">Attempt Exam</a></td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="6"> <h1>No available exams</h1></td>
        </tr>
      @endif
    </tbody>
  </table>
@endsection
