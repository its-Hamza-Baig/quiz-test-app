<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Photocontroller;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Student\Studentcontroller;
use App\Http\Controllers\Admin\Addstudentcontroller;



// ***********************  login routes ***********************  

Route::get('/', function(){
    return redirect('/loginn');
});
Route::get('/loginn', [Authcontroller::class, 'loadLogin']);

Route::post('/loginn', [Authcontroller::class, 'userlogin'])->name('loginRequest');





// ***********************  register routes ***********************  

Route::get('/signup', function () {
    return view('signup');
});
Route::post('/signup', [Authcontroller::class, 'register'])->name('register');

// ***********************   logout routes ******************************
Route::get('/logout', [Authcontroller::class, 'logout']);


// ***********************   forget password routes ******************************
Route::get('/forget-password', [Authcontroller::class, 'forgetPasswordLoad']);
Route::post('/forget-password', [Authcontroller::class, 'forgetPassword'])->name('forgetPassword');

Route::get('/reset-password', [Authcontroller::class, 'resetPasswordLoad']);
Route::post('/reset-password', [Authcontroller::class, 'resetPassword'])->name('resetPassword');









//***********************   admin routes ***********************  

Route::group(['middleware' => ['web', 'CheckAdmin']], function(){



    Route::get('/admin/dashboard', [Admincontroller::class, 'dashboard']);

    // classes routes 
    Route::get('/classes', [Admincontroller::class, 'classesRecord'])->name('classes');

    Route::post('/add-class', [Admincontroller::class, 'addClass'])->name('addclass');
    Route::post('/edit-class', [Admincontroller::class, 'editClass'])->name('editclass');
    Route::post('/delete-class', [Admincontroller::class, 'deleteClass'])->name('deleteclass');
    
    // subjects routes 
    Route::get('/classes/{id}', [Admincontroller::class, 'subjectsRecords'])->name('subjects_Records');


    Route::post('/add-subject', [Admincontroller::class, 'addSubject'])->name('add-subject');
    Route::post('/edit-subject', [Admincontroller::class, 'editSubject'])->name('edit-subject');
    Route::post('/delete-subject', [Admincontroller::class, 'deleteSubject'])->name('delete-subject');

    // exams route 
    Route::get('/classes/subjects/{id}', [Admincontroller::class, 'showExams'])->name('showExams');
    Route::post('/add-exam', [Admincontroller::class, 'addExams'])->name('addExams');
    Route::post('/update-exam', [Admincontroller::class, 'updateExams'])->name('updateExams');
    Route::post('/delete-exam', [Admincontroller::class, 'deleteExams'])->name('deleteExams');


    // quiz page route 
    Route::get('/exam/{id}', [Admincontroller::class, 'loadQuestion'])->name('loadQuestion');
    Route::post('/add-question', [Admincontroller::class, 'addQuestion'])->name('addQuestion');
    Route::post('/delete-question', [Admincontroller::class, 'deleteQuestion'])->name('deleteQuestion');


    // students route 
    Route::get('/students', [Addstudentcontroller::class, 'loadStudents'])->name('loadStudents');
    Route::post('/add-student', [Addstudentcontroller::class, 'addStudent'])->name('add-student');
    Route::post('/load-model', [Addstudentcontroller::class, 'loadModel'])->name('add-student-model');
    Route::get('/admin/student/result/{id}', [Admincontroller::class, 'loadResult'])->name('loadResult');
    Route::get('/student/result/{id}', [Admincontroller::class, 'loadQuiz'])->name('loadQuiz');

    
    Route::post('/photo', [Photocontroller::class, 'storePhoto'])->name('store');



});



// ***********************  student routes ***********************  

Route::group(['middleware' => ['web', 'CheckStudent']], function(){

    Route::get('/show-classes', [Studentcontroller::class, 'loadClasses'])->name('showClasses');
    Route::get('/student/dashboard', [Studentcontroller::class, 'loadDashboard'])->name('dashboard');
    Route::get('/show-exams', [Studentcontroller::class, 'loadExams'])->name('loadExams');
    Route::get('/attempt-exam/{id}', [Studentcontroller::class, 'attamptExams'])->name('attemptExams');
    Route::post('/save-exam', [Studentcontroller::class, 'saveExam'])->name('saveexam');
    Route::get('/previous-exams', [Studentcontroller::class, 'previousExams'])->name('previousExams');
    Route::get('/review-exam/{id}', [Studentcontroller::class, 'reviewExams'])->name('reviewExams');
    Route::post('/student/photo', [Photocontroller::class, 'storePhoto'])->name('storestudentphoto');

    





});






