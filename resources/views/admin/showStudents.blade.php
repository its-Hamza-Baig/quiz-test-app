@extends('layouts.admin-layout')
@section('admin-content-area')
                <!-- Page Content  -->
                <h2 class="mb-4">Students Record </h2>


                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addstudentmodel" id="addStudentButton">
    Add Student
  </button>

  @if(session('success'))
  <div class="alert alert-success mt-4">
    {{ session('success') }}
  </div>
  @endif

  
  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Class</th>
        <th scope="col">Show Results</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if(count($studentdata) > 0)
        @php
            $id = 1;
        @endphp
        @foreach($studentdata as $student)
            <tr>
            <td>{{$id++}}</td>
            <td>{{ $student->username}}</td>
            <td>{{ $student->email}}</td>
            <td>{{ $student['classname'][0]['class']}}</td>
            <td><a href="/admin/student/result/{{$student->id}}"  class="btn btn-success btn-sm">Results</a></td>
            <td>
                <button class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deletestudentmodel" data-id="{{$student->id}}">Delete</button>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
        
        <td colspan="4"> <h1>no record</h1></td>
        </tr>
        @endif

        
                
         
    </tbody>
  </table>
 




  
  <!-- add students Modal -->
  <div class="modal fade" id="addstudentmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add-student') }}" method="post" id="addstudent"> 
                @csrf 
                <div class="modal-body">
                    <label>User Name</label><br>
                    <input type="text" name="username" class="w-100" placeholder="enter your username" required><br><br>
                    <label>Email</label><br>
                    <input type="email" name="email" class="w-100" placeholder="enter your email" required><br><br>
                    
                    <label>Select Class</label><br>
                    <select name="class_id" class="w-100">
                        @if($classesList->isNotEmpty())
                            @foreach($classesList as $classrow)
                                <option value="{{ $classrow->id }}">{{ $classrow->class }}</option>
                            @endforeach
                        @else
                            <option value="">No classes available</option>
                        @endif
                    </select><br><br>

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
 <div class="modal fade" id="deletestudentmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/delete-student" method="post">
                @csrf
                <p class="text-center">Are You Sure You Want To Delete This student?</p>
                <input type="hidden" name="id"  id="delete-student-id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
  </div>


  <script>
    $(document).ready(function(){
        $(".delete-button").click(function(){
            
        var studentid = $(this).attr("data-id");
        $("#delete-student-id").val(studentid);

        });
    });


  </script>



  @endsection