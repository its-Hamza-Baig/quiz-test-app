@extends('layouts.admin-layout')
@section('admin-content-area')
                <!-- Page Content  -->
                <h2 class="mb-4">SUBJECTS </h2>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary add-model-box" data-toggle="modal" data-target="#addsubjectmodel">
    Add Subject
  </button>



  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Subject</th>
        <th scope="col">Show Quiz</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @if(count($subject_data) > 0)
        @php
            $id = 1;
        @endphp
        @foreach($subject_data as $subject)
        <tr>
            <td>{{ $id++ }}</td>
            <td>{{ $subject->subject }}</td>
            <td>
                <a href="{{ route('showExams', ['id' => $subject->id]) }}" class="btn btn-sm btn-success">Show Quiz</a>
            </td>

            <td><button class="btn btn-success btn-sm edit-button"  data-toggle="modal" data-target="#editsubjectmodel" data-id={{ $subject->id }} data-subject={{ $subject->subject }}>Edit</button></td>
                    
            <td><button class="btn btn-danger btn-sm delete-button"  data-toggle="modal" data-target="#deletesubjectmodel" data-id={{ $subject->id }} data-subject={{ $subject->subject }}>Delete</button></td>
        </tr>
       @endforeach
       @else 
       <tr>
        <td colspan="4"><h1>No Record Found</h1></td>
       </tr>
       @endif
      
    </tbody>
  </table>




  <!--  add Modal -->
  <div class="modal fade" id="addsubjectmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/add-subject" method="post">
                @csrf
                <div class="modal-body">
                    <label>Subject</label>
                    <input type="text" name="subject" placeholder="enter your subject" required>
                    <input type="hidden" name="classID" id="urlClassID">
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
 <div class="modal fade" id="editsubjectmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/edit-subject" method="post">
                @csrf
                <div class="modal-body">
                    <label>Subject</label>
                    <input type="text" name="subject" placeholder="enter your subject" required id="edit-subject">
                    <input type="hidden" name="id"  id="edit-subject-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>


  
 <!-- delete Modal -->
 <div class="modal fade" id="deletesubjectmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/delete-subject" method="post">
                @csrf
                    <p class="text-center">Are You Sure You Want To Delete This Subject?</p>
                    <input type="hidden" name="id"  id="delete-subject-id">
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

let classID = urlParts[urlParts.length - 1];

console.log(classID);

$(document).ready(function(){
    $(".add-model-box").click(function(){
        $("#urlClassID").val(classID);

    });

    $(".edit-button").click(function(){
        var subjectId = $(this).attr("data-id");
        var subjectName = $(this).attr("data-subject");

        $("#edit-subject").val(subjectName);
        $("#edit-subject-id").val(subjectId);

    });

    $(".delete-button").click(function(){
        var subjectId = $(this).attr("data-id");

        $("#delete-subject-id").val(subjectId);

    });

});
  </script>

@endsection