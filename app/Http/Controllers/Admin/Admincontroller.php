<?php

namespace App\Http\Controllers\Admin;

use App\Models\exam;
use App\Models\Image;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Classes;
use App\Models\Question;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class Admincontroller extends Controller
{


    public function dashboard(){
        $id =  auth()->user()->id;
        $photo = Image::where('user_id', $id)->get();
        return view('admin.dashboard', compact('photo'));
    }




    public function classesRecord(){
        $userid = auth()->user()->id;
        $classesList = Classes::where('user_id', $userid)->get();
        if($classesList){
        return view('admin.classes', compact('classesList'));

        }
        return view('admin.classes');
    }




    public function addClass(Request $request){
        $classes = new Classes;
        $userid = auth()->user()->id;

        $classes->class = $request->class;
        $classes->user_id = $userid;
        $classes->save();
        return back();
    }

    public function editClass(Request $request){
        $class_id = $request->id;
        $class_data = Classes::find($class_id);
        $class_data->class = $request->class;
        $class_data->save();
        return redirect('/classes');
    }


    public function deleteClass(Request $request){
        $delete_class_id = $request->id;
        $delete_class = Classes::find($delete_class_id);
        if($delete_class){
            $delete_class->delete();
        }else{
            echo "no record found";
            return redirect("/classes");
        }
        return redirect("/classes");

    }
 

    public function subjectsRecords(Request $request, $id){
        $id = request('id');

        $subject_data = Subjects::where('class_id', $id)->get();


        return view('admin.subjects', compact('subject_data'));


    }

    public function addSubject(Request $request){
        $subject = new Subjects;
        $subject->subject = $request->subject;
        $subject->class_id = $request->classID;

        $subject->save();
        return back();


    }

    public function editSubject(Request $request){
        $editSubject = Subjects::find($request->id);

        $editSubject->subject = $request->subject;
        $editSubject->save();

        return back();
    }

    public function deleteSubject(Request $request){
        $deleteID =  Subjects::find($request->id);
        $deleteID->delete();

        return back();

    }


    // exams function 

    public function showExams(Request $request, $id){
        $id = request('id');

        $examsrecord = exam::where('subject_name',$id)->with('subjects')->get();

        return view('admin.exams', compact('examsrecord'));

    }

    public function addExams(Request $request){
        $addexam = new exam;
        $addexam->exams_name = $request->examName;
        $addexam->subject_name = $request->subjectid;
        $addexam->total_marks = $request->totalMarks;
        $addexam->date = $request->date;
        $addexam->time = $request->time;

        $addexam->save();
        return back();
    }

    public function updateExams(Request $request){
        $examData = exam::find($request->examid);

        $examData->exams_name = $request->examname;
        $examData->total_marks = $request->totalMarks;
        $examData->date = $request->date;
        $examData->time = $request->time;

        $examData->save();
        return back();
    }

    
    public function deleteExams(Request $request){
        $deleteExam = Exam::find($request->id);
    
        if ($deleteExam) {
            $deleteExam->questions()->delete();
    
            $deleteExam->delete();
    
            return back()->with('success', 'Exam, questions, and answers deleted successfully.');
        } else {
            return back()->with('error', 'Exam not found.');
        }
    }
    


    // exam complete 

    // question start 

    public function loadQuestion(Request $request, $id){
        $quiz_qs = Question::where('exam_id',$id)->with('answers')->get();

        return view('admin.quizQuestions', compact('quiz_qs'));
    }
    

    public function addQuestion(Request $request){
        
        $questionId = Question::insertGetId([
            'question' =>$request->question,
            'exam_id' =>$request->examid
        ]);
        foreach($request->answers as $answer){
            $correct_answer = 0;
            if($request->correct_answer == $answer){
                $correct_answer = 1;
            }

            Answer::insert([
                'question_id' => $questionId,
                'answer' => $answer,
                'correct_answer' => $correct_answer
            ]);
        }

        return back();
    }

    public function deleteQuestion(Request $request){
        $deleteqs = Question::find($request->id);

        $deleteqs->delete();
        return back();

    }

    public function loadResult(Request $request, $id){
        $getexams = Result::where('user_id', $id)->with('examdata')->get();
        return view('admin.studentResults', compact('getexams'));
    }


    public function loadQuiz(Request $request, $id){
        $examqs = Question::where('exam_id', $id)->with('answers')->get();
        return view('admin.attamptedQuiz', compact('examqs'));
    }



    
    
}
