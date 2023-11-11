@extends('layouts.admin-layout')
@section('admin-content-area')
                <!-- Page Content  -->
                <h2 class="mb-4">Exam </h2>


                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary add-subject" data-toggle="modal" data-target="#addexammodel">
    Add Exam
  </button>


  
  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Exam Name</th>
        <th scope="col">Subjects</th>
        <th scope="col">Total Marks</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Show Qs & Ans</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if(count($examsrecord) > 0)
        @php
            $id = 1;
        @endphp
        @foreach($examsrecord as $examdata)
        <tr>
            <td>{{ $id++ }}</td>
            <td>{{ $examdata->exams_name }}</td>
            <td>{{ $examdata->subjects[0]['subject'] }}</td>
            <td>{{ $examdata->total_marks }}</td>
            <td>{{ $examdata->date }}</td>
            <td>{{ $examdata->time }} Hrs</td>
            <td><a href="{{ route('loadQuestion', ['id' =>  $examdata->id]) }}" class="btn btn-sm btn-success">Show Qs & Ans</a></td>
            <td><button class="btn btn-success btn-sm edit-button" data-toggle="modal" data-target="#editexammodel" data-id = "{{ $examdata->id }}" data-exam="{{ $examdata->exams_name }}" data-attempt-time="{{ $examdata->attempt_time }}" data-tMarks="{{ $examdata->total_marks }}" data-date="{{ $examdata->date }}" data-time="{{ $examdata->time }}">Edit</button>
                <button class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteexammodel" data-id = "{{ $examdata->id }}">Delete</button></td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="4"><h2>no record found</h2></td>
        </tr>
        @endif

        
    </tbody>
  </table>
 


  
  
  <!-- add Exam Modal -->
  <div class="modal fade" id="addexammodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/add-exam" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="subjectid" id="subjectId">
                    <!-- <label>Exam Name</label> -->
                    <input type="text" name="examName" class="w-100" placeholder="enter your Exam Name" required><br><br>


                    <input type="text" name="totalMarks" class="w-100" placeholder="enter Exam total marks" required><br><br>

                    <!-- <label>Exam Date</label> -->
                    <input type="date" name="date" class="w-100" placeholder="enter Exam Date" required min={{ date('Y-m-d') }}><br><br>

                    <!-- <label>Exam Time</label> -->
                    <input type="time" name="time" class="w-100" placeholder="enter Exam Time" required><br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
  </div>

  




  <!-- edit Modal -->
  <div class="modal fade" id="editexammodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/update-exam" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="examid" id="examid">
                    <!-- <label>Exam Name</label> -->
                    <input type="text" name="examname" class="w-100" placeholder="enter your Exam Name" id="exam-name" required><br><br>


                    <input type="text" name="totalMarks" id="totalMarks" class="w-100" placeholder="enter Exam total marks" required><br><br>
                    <!-- <label>Exam Date</label> -->
                    <input type="date" name="date" class="w-100" placeholder="enter Exam Date" id="exam-date" required><br><br>
                    <!-- <label>Exam Time</label> -->
                    <input type="time" name="time" class="w-100" placeholder="enter Exam Time" id="exam-time" required><br><br>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
  </div>


  
 <!-- delete Modal -->
 <div class="modal fade" id="deleteexammodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/delete-exam" method="post">
                @csrf
                    <p class="text-center">Are You Sure You Want To Delete This Exam?</p>
                    <input type="hidden" name="id"  id="delete-exam-id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
  </div>



  <script>
let url = window.location.href;

let urlParts = url.split('/');

let subjectID = urlParts[urlParts.length - 1];

console.log(subjectID);

$(document).ready(function(){


    $(".add-subject").click(function(){
        $("#subjectId").val(subjectID);

    });

    $(".edit-button").click(function(){
        var examid = $(this).attr("data-id");
        var examname = $(this).attr("data-exam");
        var totalMarks = $(this).attr("data-tMarks");
        var examdate = $(this).attr("data-date");
        var examtime = $(this).attr("data-time");

        $("#examid").val(examid);
        $("#exam-name").val(examname);
        $("#totalMarks").val(totalMarks);
        $("#exam-date").val(examdate);
        $("#exam-time").val(examtime);
        $("#subjectid").val(subjectID);
        


    });


    $(".delete-button").click(function(){
        var examid = $(this).attr("data-id");
        $("#delete-exam-id").val(examid);

    });

});
  </script>



@endsection