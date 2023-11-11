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
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @if(count($exams) > 0)
      @php
            $id = 1;
        @endphp
        @foreach($exams as $exam)
          <tr>
            <td>{{ $id++ }}</td>
            <td>{{ $exam->exams_name }}</td>
            <td>{{ $exam->total_marks }}</td>
            <td>{{ $exam->date }}</td>
            <td>{{ $exam->time }}</td>
            <td><a href="/attempt-exam/{{ $exam->id }}" class="btn btn-sm btn-primary">Attempt Exam</a></td>
            @if ($exam->date > date('Y-m-d'))
                
            <td style="color: greenyellow">Coming Soon</td>
            @else
            <td style="color: rgb(238, 118, 118)">Missed</td>

            @endif
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
