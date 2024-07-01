<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class HelloworldController extends Controller
{
  public function index()
  {
    // $student = Student::find(1);
    // $exam_results = $student->exam_results;
    // dd($exam_results);

    $exam_result = ExamResult::find(1);
    $student = $exam_result->student;

    return view('helloworld');
  }
  public function routeShouldBeObsoleted()
  {
    return 'route_should_be_obsoleted';
  }
}
