<?php

namespace App\Http\Controllers\Student;

use auth;
use App\Models\exam;
use App\Models\Image;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Classes;
use App\Models\Question;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Models\exams_attempt;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class Studentcontroller extends Controller
{
    public function loadClasses(){
        $studentclassid = auth()->user()->class_id;
         
        $classesList = Classes::where('id', $studentclassid)->get();

        return view('student.showclasses', compact('classesList'));
    }

    public function loadDashboard(){
        $userid = auth()->user()->id;
        $studentclassid = auth()->user()->class_id;
        $photo = Image::where('user_id', $userid)->get();
         
        $classesList = Classes::where('id', $studentclassid)->with('subjects')->get();

        return view('student.dashboard', compact('classesList', 'photo'));
    }

  
    public function loadExams(){
        $userclassid = auth()->user()->class_id;
        $usersubject = Subjects::where('class_id', $userclassid)->pluck('id');
    
        $examdata = exam::whereIn('subject_name', $usersubject)->with('subjects')->get();
    
        $resultexamIds = Result::where('user_id', auth()->user()->id)->pluck('exam_id')->toArray();
    
        $exams = $examdata->reject(function ($exam) use ($resultexamIds) {
            return in_array($exam->id, $resultexamIds);
        });
        return view('student.showExams', compact('exams', 'examdata'));
    }
    

    public function attamptExams($id){
        $currentTime = Carbon::now()->toTimeString();

        $examdata = exam::where('id', $id)->get();

        if(count($examdata) > 0){
            if(Carbon::parse($examdata[0]['date'])->isToday()){
                $qna = Question::where('exam_id', $id)->with('answers')->inRandomOrder()->get();

                return view('student.attemptquiz', ['success'=>true, 'exam'=>$examdata, 'qna'=>$qna]);


            }
            else if(Carbon::parse($examdata[0]['date'])->isFuture()){
                return view('student.attemptquiz', ['success'=>false, 'msg'=>'this exam will be start on '.$examdata[0]['date'], 'exam'=>$examdata]);
            }
            else{
                return view('student.attemptquiz', ['success'=>false, 'msg'=>'You missed this exam  '.$examdata[0]['date'], 'exam'=>$examdata]);
            


            }
        }else{
            return "no exam counted"; 
        }
    }


    public function saveExam(Request $request) {
        $userid = auth()->user()->id;
        $examid = $request->examid;
        $totalmarks = exam::where('id', $examid)->value('total_marks');
        $totalquestions = Question::where('exam_id', $examid)->count();
        $marksPerQuestion = $totalmarks / $totalquestions;
    
        $questionIds = $request->input('q');
        $selectedAnswers = [];
        $count = 1;
        foreach ($questionIds as $qId) {
            $selectedAnswers[$qId] = $request->input('ans_' . $count++);
        }

        $examtotalMarks = 0;
    
        foreach ($selectedAnswers as $qId => $selectedAnswerId) {
            $correctAnswer = Answer::where('question_id', $qId)
                ->where('correct_answer', 1)
                ->first();
    
            if ($correctAnswer && $correctAnswer->id == $selectedAnswerId) {
                $examtotalMarks += $marksPerQuestion;
            }
        }
        $newRecord = Result::create([
            'exam_id' => $examid,
            'user_id' => $userid,
            'obt_marks' => $examtotalMarks,

        ]);

        // return $questionIds;
        
        return redirect('/previous-exams');
    }
    

    public function previousExams(){
        
        $userid = auth()->user()->id;
        $previousexams = Result::where('user_id', $userid)->with('examdata')->get();

        return view('student.previousExams', compact('previousexams'));

    }

    public function reviewExams(Request $request, $id){
        $examQuestions = Question::where('exam_id', $id)->with('answers')->get();
        return view('student.reviewexam', compact('examQuestions'));
    }
}
