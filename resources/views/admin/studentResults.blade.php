@extends('layouts.admin-layout')
@section('admin-content-area')
    <!-- Page Content  -->
    <h2 class="mb-4">Result </h2>

    @if (count($getexams) > 0)

    @php
        $id = 1;
    @endphp




    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Quiz Name</th>
            <th scope="col">Quiz Date</th>
            <th scope="col">Quiz Time</th>
            <th scope="col">Total Marks</th>
            <th scope="col">Obt Marks</th>
            <th scope="col">Show Quiz</th>
            </tr>
        </thead>
        @foreach ($getexams as $exam)
        <tbody>
            <tr>
                <td>{{$id++}}</td>
                <td>{{$exam['examdata']['exams_name']}}</td>
                <td>{{$exam['examdata']['date']}}</td>
                <td>{{$exam['examdata']['time']}}</td>
                <td>{{$exam['examdata']['total_marks']}}</td>
                <td>{{$exam['obt_marks']}}</td>
                <td>
                    <a href="/student/result/{{$exam->exam_id}}" class="btn btn-sm btn-success">Show Quiz</a>
                </td>                        
            </tr>
            
        </tbody>
        @endforeach
        </table>
        
    @endif
    
@endsection