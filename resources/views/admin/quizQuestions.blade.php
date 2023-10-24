@extends('layouts.admin-layout')
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
        <th scope="col">Answers</th>
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
            <td class="row-number"></td>
            <td>{{ $question->question }}</td>
            <td><a href="#" class="ansbutton" data-toggle="modal" data-target="#showAnsmodel" data-id="{{ $question->id}}">See answer</a></td>
            <td>
                <button class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteQuestionmodel" data-id="{{ $question->id}}">Delete</button>
            </td>
        </tr>
        

        @endforeach
            
        @else
        <tr>
            <td><h2>no record</h2></td>
        </tr>
        @endif

    </tbody>
  </table>
 


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
                <form id="addQuestionForm" action="/add-question" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="examid" id="examid">
                            <label for="question">Question</label>
                            <input type="text" class="form-control border border-secondary" id="question" name="question" required>
                        </div>
                        <div class="form-group" id="answersContainer">
                            <!-- Answers will be dynamically added here -->
                        </div>
                        <button type="button" class="btn btn-success mt-2" id="addAnswer">Add Answer</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- show ans Modal -->
    <div class="modal fade" id="showAnsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Show Answers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body showanswers">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <form action="/delete-question" method="post">
                @csrf
                    <p class="text-center">Are You Sure You Want To Delete This question?</p>
                    <input type="hidden" name="id"  id="delete-question-id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
  </div>




    <script>


$(document).ready(function() {
    $('.row-number').each(function(index) {
        $(this).text(index + 1);
    });


    $(".delete-button").click(function(){
    var deleteid = $(this).attr('data-id');
    $("#delete-question-id").val(deleteid);
    });

    $(".ansbutton").click(function(){
    var questions = @json($quiz_qs);
    var qid = $(this).attr('data-id');

    var html = '';
    console.log(questions);

    for(let i = 0; i<questions.length; i++){

        if(questions[i]['id'] == qid){
            var answersLength = questions[i]['answers'].length;

            for(let j = 0; j < answersLength; j++ ){
                let correct = questions[i]['answers'][j]['correct_answer'] == 1;

                html += `
                <div class="mb-2">
                    <span class="border p-2" style="border-width: 2px; border-color: #000; background-color: #ADD8E6; color: #000; display: block; width: 100%;">
                        ${questions[i]['answers'][j]['answer']}
                        ${correct ? '<i class="fas fa-check text-success mr-2 mt-1 float-right"></i>' : '<i class="fas fa-times text-danger mr-2 mt-1 float-right"></i>'}
                    </span>
                </div>`;

            }

            break;
        }
    }
    $(".showanswers").html(html);
});

});









               // Get the current URL
let url = window.location.href;

// Split the URL by "/"
let urlParts = url.split('/');

// The class ID will be the last part of the URL
let examID = urlParts[urlParts.length - 1];

console.log(examID);


        document.addEventListener('DOMContentLoaded', function() {

            
            var exam_id = document.getElementById('examid');
            exam_id.value = examID;
            // console.log(exam_id);


            var addAnswerButton = document.getElementById('addAnswer');
            var submitButton = document.getElementById('submitBtn');

            addAnswerButton.addEventListener('click', function() {
                var answerCount = document.querySelectorAll('.answer-input').length;

                

                var answersContainer = document.getElementById('answersContainer');

                var answerDiv = document.createElement('div');
                answerDiv.classList.add('form-group');

                var answerlabel = document.createElement('label');
                answerlabel.for = 'question';
                answerlabel.textContent = 'Answer';

                var answerInput = document.createElement('input');
                answerInput.type = 'text';
                answerInput.classList.add('form-control', 'answer-input');
                answerInput.name = 'answers[]';
                answerInput.required = true;
                answerInput.style.border = '2px solid #ccc'; // Add 2px grey border

                var answerRadio = document.createElement('input');
                answerRadio.type = 'radio';
                answerRadio.name = 'correct_answer';
                answerRadio.classList.add('correctAnswer');
                // answerRadio.value = answerCount + 1;

                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-danger', 'mt-2');
                removeButton.textContent = 'Remove';
                removeButton.style.marginLeft = '5px'; // Add some margin for spacing

                removeButton.addEventListener('click', function() {
                    answerDiv.remove();
                    removeButton.remove();
                    answerRadio.remove();
                    validateForm();
                });

                answerDiv.appendChild(answerlabel);
                answerDiv.appendChild(answerInput);
                answersContainer.appendChild(answerDiv);

                answersContainer.appendChild(answerRadio);
                answersContainer.appendChild(removeButton);


                validateForm();
            });

            function validateForm() {
                var answerCount = document.querySelectorAll('.answer-input').length;
                if (answerCount < 2) {
                    submitButton.disabled = true;
                } else {
                    submitButton.disabled = false;
                   
                }
                if(answerCount == 4){
                    addAnswerButton.disabled = true;
                }else{
                    addAnswerButton.disabled = false;
                }
            }
        });

        
        // AJAX submission
        // document.getElementById('addQuestionForm').addEventListener('submit', function(e) {
        //     e.preventDefault();

        //     var checkIsCorrect = false;

        //     for(let i = 0; i < $(".correctAnswer").length; i++){
        //         if( $(".correctAnswer:eq("+i+")").prop('checked') == true){
        //             checkIsCorrect = true;
        //             // $(".correctAnswer:eq("+i+")").val( $(".correctAnswer:eq("+i+")").previous().find('input').val());
        //             $(".correctAnswer:eq("+i+")").val($(".correctAnswer:eq("+i+")").prev().find('input[type="text"]').val());

        //         }
        //     }

        //     if(checkIsCorrect){
        //         // console.log(checkIsCorrect);

        //         var formData = $(this).serialize();
        //         $.ajax({
        //             url:"{{ route('addQuestion')}}",
        //             type:"POST",
        //             data:formData,
        //             success:function(data){
        //                 console.log(data);
        //                 if(data.success == true){
        //                     location.reload;
        //                 }else{
        //                     alert(data.meassage);
        //                 }
        //             }
        //         });

        //     } 


            
        //     var formData = new FormData(this);

        //     fetch('/your/api/endpoint', {
        //         method: 'POST',
        //         body: formData,
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         // Handle response data (if needed)
        //     })
        //     .catch(error => console.error('Error:', error));
        // });










//         document.getElementById('addQuestionForm').addEventListener('submit', function(e) {
//     e.preventDefault();

//     var checkIsCorrect = false;

//     for (let i = 0; i < $(".correctAnswer").length; i++) {
//         // console.log($(".correctAnswer:eq(" + i + ")").prop('checked'));

//         if ($(".correctAnswer:eq(" + i + ")").prop('checked') == true) {
//             checkIsCorrect = true;
//             $(".correctAnswer:eq(" + i + ")").val($(".correctAnswer:eq(" + i + ")").prev().find('input[type="text"]').val());
//         }
//     }

//     if (checkIsCorrect) {
//         var formData = $(this).serialize();
//         $.ajax({
//             url: "{{ route('addQuestion')}}",
//             type: "POST",
//             data: formData,
//             success: function(data) {
//                 console.log(data);
//                 if (data.success == true) {
//                     location.reload;
//                 } else {
//                     alert(data.meassage);
//                 }
//             }
//         });
//     }
// });





document.getElementById('addQuestionForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var correctAnswerValue = 0; // Default value for incorrect option

    for (let i = 0; i < $(".correctAnswer").length; i++) {
        if ($(".correctAnswer:eq(" + i + ")").prop('checked') == true) {
            // correctAnswerValue = 1; // Set value to 1 for correct option
            correctAnswerValue = $(".correctAnswer:eq(" + i + ")").val($(".correctAnswer:eq(" + i + ")").prev().find('input[type="text"]').val());

        }
    }

    if (correctAnswerValue !== undefined) {
        // Add your code to handle the correctAnswerValue here

        // Assuming there's an input field with name 'correct_answer' in your form
        // $("input[name='correct_answer']").val(correctAnswerValue);

        // var formData = $(this).serialize();
        // $.ajax({
        //     url: "{{ route('addQuestion')}}",
        //     type: "POST",
        //     data: formData,
        //     success: function(data) {
        //         console.log(data);
        //         if (data.success == true) {
        //             location.reload();
        //         }
        //     }
        // });

        this.submit();
    }
});

    </script>
@endsection
