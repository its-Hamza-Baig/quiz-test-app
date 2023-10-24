@extends('layouts.student-layout')
@section('student-content-area')
    <!-- Page Content  -->
    <h2 class="mb-4">Quiz </h2>

    
  <table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Question</th>
        <th scope="col">Answers</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if (count($examQuestions) > 0)

        {{-- {{$examQuestions}} --}}
        @foreach ($examQuestions as $question )
            
        <tr>
            <td class="row-number"></td>
            <td>{{ $question->question }}</td>
            <td><a href="#" class="ansbutton" style="color: greenyellow" data-toggle="modal" data-target="#showAnsmodel" data-id={{$question->id}}>See answer</a></td>
        </tr>
        
        @endforeach
        @else
        <tr>
            <td colspan="3">No Questions Get</td>
        </tr>
            
        @endif
        
        

            
        

    </tbody>
  </table>
 




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






    <script>

$(document).ready(function() {
    $('.row-number').each(function(index) {
        $(this).text(index + 1);
    });



    $(".ansbutton").click(function(){
    var questions = @json($examQuestions);
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

    </script>
@endsection
