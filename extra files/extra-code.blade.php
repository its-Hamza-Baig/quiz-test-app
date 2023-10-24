{{-- @extends('layouts.admin-layout')
@section('admin-content-area')
                <!-- Page Content  -->
                <h2 class="mb-4">Quiz </h2>


                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addexammodel">
    Add Qs
  </button>


  
  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Question</th>
        <th scope="col">Answer</th>
        <!-- <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Show Qs & Ans</th> -->
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if (count($quiz_qs) > 0)
        @foreach ($quiz_qs as $question)
            
        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->question }}</td>
            <td><a href="#" class="ansbutton"  data-toggle="modal" data-target="#showAnsmodel"> see answer</a></td>
            <!-- <td>Test date</td>
            <td>Test Time</td> -->
            <td><button class="btn btn-success btn-sm edit-button" data-toggle="modal" data-target="#editQuestionmodel">Edit</button>
                <button class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteQuestionmodel">Delete</button></td>


        </tr>

        @endforeach
            
        @else
        <tr>
            <td><h2>no record</h2></td>
        </tr>
        @endif

    </tbody>
  </table>
 





  <!-- show ans Modal -->
  <div class="modal fade" id="showAnsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <!-- <label>Exam Name</label> -->
                    <input type="text" name="class" class="w-100" placeholder="enter your Exam Name" required><br><br>
                    <!-- <label>Exam Date</label> -->
                    <input type="date" name="date" class="w-100" placeholder="enter Exam Date" required><br><br>
                    <!-- <label>Exam Time</label> -->
                    <input type="time" name="time" class="w-100" placeholder="enter Exam Time" required><br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
        </div>
    </div>
  </div>


  <!-- edit Modal -->
  <div class="modal fade" id="editQuestionmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <!-- <label>Exam Name</label> -->
                    <input type="text" name="class" class="w-100" placeholder="enter your Exam Name" required><br><br>
                    <!-- <label>Exam Date</label> -->
                    <input type="date" name="date" class="w-100" placeholder="enter Exam Date" required><br><br>
                    <!-- <label>Exam Time</label> -->
                    <input type="time" name="time" class="w-100" placeholder="enter Exam Time" required><br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
        </div>
    </div>
  </div>


  
 <!-- delete Modal -->
 <div class="modal fade" id="deleteQuestionmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                    <p class="text-center">Are You Sure You Want To Delete This Exam?</p>
                    <input type="hidden" name="id"  id="delete-subject-id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
        </div>
    </div>
  </div>



  
  <!-- add Qs Modal -->
  <div class="modal fade" id="addexammodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <!-- <label>Exam Name</label> -->
                    <input type="text" name="class" class="w-100" placeholder="enter your Exam Name" required><br><br>
                    <!-- <label>Exam Date</label> -->
                    <input type="date" name="date" class="w-100" placeholder="enter Exam Date" required><br><br>
                    <!-- <label>Exam Time</label> -->
                    <input type="time" name="time" class="w-100" placeholder="enter Exam Time" required><br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
        </div>
    </div>
  </div>

@endsection --}}

{{-- 


@extends('layouts.admin-layout')
@section('admin-content-area')
    <!-- Page Content  -->
    <h2 class="mb-4">Quiz </h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addexammodel">
        Add Qs
    </button>

    <!-- add Qs Modal -->
    <div class="modal fade" id="addexammodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addQuestionForm"> <!-- Added a form for submission -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>
                        <div class="form-group">
                            <label for="answers">Answers</label>
                            <div id="answersContainer">
                                <!-- Answers will be dynamically added here -->
                            </div>
                            <button type="button" class="btn btn-success mt-2" id="addAnswer">Add Answer</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var answersContainer = document.getElementById('answersContainer');
            var addAnswerButton = document.getElementById('addAnswer');

            addAnswerButton.addEventListener('click', function() {
                var answerCount = answersContainer.querySelectorAll('.answer-input').length;

                if (answerCount >= 4) {
                    alert('You can only add up to 4 answers.');
                    return;
                }

                var answerDiv = document.createElement('div');
                answerDiv.classList.add('form-group');

                var answerInput = document.createElement('input');
                answerInput.type = 'text';
                answerInput.classList.add('form-control', 'answer-input');
                answerInput.name = 'answers[]';
                answerInput.required = true;

                var answerRadio = document.createElement('input');
                answerRadio.type = 'radio';
                answerRadio.name = 'correct_answer';
                answerRadio.value = answerCount + 1;

                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-danger', 'mt-2');
                removeButton.textContent = 'Remove';

                removeButton.addEventListener('click', function() {
                    answerDiv.remove();
                });

                answerDiv.appendChild(answerInput);
                answerDiv.appendChild(answerRadio);
                answerDiv.appendChild(removeButton);

                answersContainer.appendChild(answerDiv);
            });
        });
    </script>
@endsection 











@extends('layouts.admin-layout')
@section('admin-content-area')
    <!-- Page Content  -->
    <h2 class="mb-4">Quiz </h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addexammodel">
        Add Qs
    </button>

    <!-- add Qs Modal -->
    <div class="modal fade" id="addexammodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addQuestionForm"> <!-- Added a form for submission -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required style="border: 2px solid #ccc;">
                        </div>
                        <div class="form-group">
                            <label for="answers">Answers</label>
                            <input type="text" class="form-control answer-input" name="answers[]" required style="border: 2px solid #ccc;">
                            <button type="button" class="btn btn-success mt-2" id="addAnswer">Add Answer</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addAnswerButton = document.getElementById('addAnswer');

            addAnswerButton.addEventListener('click', function() {
                var answerInput = document.createElement('input');
                answerInput.type = 'text';
                answerInput.classList.add('form-control', 'answer-input');
                answerInput.name = 'answers[]';
                answerInput.required = true;
                answerInput.style.border = '2px solid #ccc';

                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-danger', 'mt-2');
                removeButton.textContent = 'Remove';

                removeButton.addEventListener('click', function() {
                    answerInput.parentNode.removeChild(answerInput);
                    removeButton.parentNode.removeChild(removeButton);
                });

                var answersContainer = document.querySelector('.form-group'); // Get the parent container
                answersContainer.appendChild(answerInput);
                answersContainer.appendChild(removeButton);
            });
        });
    </script>
@endsection --}}


{{--  
@extends('layouts.admin-layout')
@section('admin-content-area')
    <!-- Page Content  -->
    <h2 class="mb-4">Quiz </h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addexammodel">
        Add Qs
    </button>

    <!-- add Qs Modal -->
    <div class="modal fade" id="addexammodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addQuestionForm"> <!-- Added a form for submission -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required style="border: 2px solid #ccc;">
                        </div>
                        <div class="form-group">
                            <label for="answers">Answers</label>
                            <div id="answersContainer"></div>
                            <button type="button" class="btn btn-success mt-2" id="addAnswer">Add Answer</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addAnswerButton = document.getElementById('addAnswer');

            addAnswerButton.addEventListener('click', function() {
                var answersContainer = document.getElementById('answersContainer');

                var answerDiv = document.createElement('div');
                answerDiv.classList.add('form-group');

                var answerInput = document.createElement('input');
                answerInput.type = 'text';
                answerInput.classList.add('form-control', 'answer-input');
                answerInput.name = 'answers[]';
                answerInput.required = true;
                answerInput.style.border = '2px solid #ccc';

                var answerRadio = document.createElement('input');
                answerRadio.type = 'radio';
                answerRadio.name = 'correct_answer';
                answerRadio.value = answersContainer.querySelectorAll('.form-group').length + 1;

                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-danger', 'mt-2');
                removeButton.textContent = 'Remove';

                removeButton.addEventListener('click', function() {
                    answerDiv.remove();
                });

                answerDiv.appendChild(answerInput);
                answerDiv.appendChild(answerRadio);
                answerDiv.appendChild(removeButton);

                answersContainer.appendChild(answerDiv);
            });
        });
    </script>
@endsection
--}}
{{-- 

@extends('layouts.admin-layout')
@section('admin-content-area')
    <!-- Page Content  -->
    <h2 class="mb-4">Quiz </h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addexammodel">
        Add Qs
    </button>

    <!-- add Qs Modal -->
    <div class="modal fade" id="addexammodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addQuestionForm"> <!-- Added a form for submission -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>
                        <div class="form-group" id="answersContainer">
                            <!-- Answers will be dynamically added here -->
                        </div>
                        <button type="button" class="btn btn-success mt-2" id="addAnswer">Add Answer</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addAnswerButton = document.getElementById('addAnswer');

            addAnswerButton.addEventListener('click', function() {
                var answerCount = document.querySelectorAll('.answer-input').length;

                if (answerCount >= 4) {
                    alert('You can only add up to 4 answers.');
                    return;
                }

                var answersContainer = document.getElementById('answersContainer');

                var answerDiv = document.createElement('div');
                answerDiv.classList.add('form-group');

                var answerInput = document.createElement('input');
                answerInput.type = 'text';
                answerInput.classList.add('form-control', 'answer-input');
                answerInput.name = 'answers[]';
                answerInput.required = true;
                answerInput.style.border = '2px solid #000'; // Add 2px border

                var answerRadio = document.createElement('input');
                answerRadio.type = 'radio';
                answerRadio.name = 'correct_answer';
                answerRadio.value = answerCount + 1;

                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-danger', 'mt-2');
                removeButton.textContent = 'Remove';
                removeButton.style.marginLeft = '5px'; // Add some margin for spacing

                removeButton.addEventListener('click', function() {
                    answerDiv.remove();
                });

                answerDiv.appendChild(answerInput);
                answerDiv.appendChild(answerRadio);
                answerDiv.appendChild(removeButton);

                answersContainer.appendChild(answerDiv);
            });
        });
        
        // AJAX submission
        document.getElementById('addQuestionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            var formData = new FormData(this);

        });
    </script>
@endsection

 --}}

