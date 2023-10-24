@extends('layouts.admin-layout')
@section('admin-content-area')
                <!-- Page Content  -->
                <h2 class="mb-4">Class </h2>


                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addclassmodel">
    Add Class
  </button>


  
  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Class</th>
        <th scope="col">Show Subjects</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if(count($classesList) > 0)
        @php
            $id = 1;
        @endphp
        @foreach($classesList as $class)
            <tr>
            <td>{{$id++}}</td>
            <td>{{ $class->class}}</td>
            <td><a href="{{ route('subjects_Records', ['id' => $class->id]) }}" class="btn btn-sm btn-success">Show Subjects</a></td>
            <td>
                <button class="btn btn-sm btn-success edit-button" data-toggle="modal" data-target="#editclassmodel" data-id = "{{ $class->id}}" data-class = "{{ $class->class }}">Edit</button>
                <button class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deleteclassmodel" data-id = "{{ $class->id}}">Delete</button>
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
 




  
  <!-- add class Modal -->
  <div class="modal fade" id="addclassmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('addclass') }}" method="post" id="addClass"> 
                @csrf 
                <div class="modal-body">
                    <label>Class</label>
                    <input type="text" name="class" placeholder="enter your class" required>

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
 <div class="modal fade" id="editclassmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/edit-class" method="post">
                @csrf
                <div class="modal-body">
                    <label>Class</label>
                    <input type="text" name="class" placeholder="enter your Class" required id="edit-class">
                    <input type="hidden" name="id"  id="edit-class-id">
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
 <div class="modal fade" id="deleteclassmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/delete-class" method="post">
                @csrf
                <p class="text-center">Are You Sure You Want To Delete This class?</p>
                <input type="hidden" name="id"  id="delete-class-id">
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
        $(".edit-button").click(function(){
            var class_id = $(this).attr('data-id');
            var class_name = $(this).attr('data-class');

            $("#edit-class").val(class_name);
            $("#edit-class-id").val(class_id);

        });


        $(".delete-button").click(function(){
            var delete_id = $(this).attr('data-id');
            $("#delete-class-id").val(delete_id);

        });

    });
  </script>


  @endsection