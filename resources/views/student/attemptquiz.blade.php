<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <title>Quiz</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 style="color: white">Welcome, {{ auth()->user()->username }} </h2>
        </div>
        <div class="row">
            <div class="text-center col-12">
                <h1 class="text-center " style="color: white" >Quiz {{ $exam[0]['exams_name'] }}</h1></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @php
                    $qcount = 1;
                @endphp
                @if ($success == true)
                    @if (count($qna) > 0)
                    <form action="/save-exam" method="post" onsubmit="return isValid()">
                        @csrf
                        <input type="hidden" name="examid" value="{{ $exam[0]['id'] }}">
                        
                            @foreach ($qna as $data)
                                <div>
                                    <h5>Q{{ $qcount++ }}. {{ $data['question'] }}</h5>
                                    <input type="hidden" name="q[]" value="{{ $data['id'] }}">
                                    <input type="hidden" name="ans_{{$qcount-1}}" id="ans_{{$qcount-1}}">
                                    @php
                                        $acount = 1;
                                    @endphp
                                    @foreach ($data['answers'] as $answer)
                                    <p><b>{{ $acount++ }})  </b> {{ $answer['answer'] }}
                                    <input type="radio" name="radio_{{$qcount-1}}" data-id="{{$qcount-1}}" class="select_ans" value="{{ $answer['id'] }}"></p>
                                        
                                    @endforeach
                                </div>
                                <br>

                                
                            @endforeach
                            <div class="text-center">
                                <input type="submit" class="btn btn-success">
                            </div>

                    </form>
                    @else
                    <h2>no question available</h2>
                        
                    @endif
                {{-- {{$qna}} --}}
                @else
                <h3 style="color: red" class="text-center">{{ $msg }}</h3>
                    
                @endif
                    
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            $('.select_ans').click(function(){
                var no = $(this).attr('data-id');
                $('#ans_'+no).val($(this).val());
            });
        });
        function isValid(){
            var result =true;

            var qlength = parseInt("{{$qcount}}")-1;
            
            $('.error_msg').remove();
            for(let i = 1; i <= qlength; i++){
                if($('#ans_'+i).val() == ""){
                    result = false;
            
                    $('#ans_'+i).parent().append('<span style="color: red" class="error_msg">please select atleast one option</span>');
                    setTimeout(() => {
                        $('.error_msg').remove();
                    }, 5000);

                }
            }

            return result;
        }
    </script>
    
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/popper.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    
</body>
</html>