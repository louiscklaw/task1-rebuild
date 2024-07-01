<?php

namespace App\Http\Controllers;

use App\Models\Category;
use DB;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CategoryController extends Controller
{


  public function index()
  {
    // $student = Student::find(1);
    // $exam_results = $student->exam_results;
    // dd($exam_results);

    $categories = DB::table('tbl_categories')->get();
    return view('pages.categories.index', compact('categories'));
  }

  public function delete(Request $request, string $category_id)
  {
    try {
      DB::beginTransaction();

      $exam = Category::find($category_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('categories.index')
        ->with('success', 'exam has been deleted successfully');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function create(Request $request)
  {
    try {
      // return create form

      return view(
        'pages.categories.create',
        compact('request')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function store(Request $request)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'description' => ''
      ]);

      // return create form
      DB::beginTransaction();

      $category = new Category();

      $category->name = $validatedData['name'];
      $category->description = $validatedData['description'];

      $category->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('categories.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $category_id)
  {
    try {
      $category = Category::find($category_id);

      return view(
        'pages.categories.edit',
        compact('category')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $category_id)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'description' => ''
      ]);

      DB::beginTransaction();

      $category = Category::find($category_id);

      $category->name = $validatedData['name'];
      $category->description = $validatedData['description'];

      $category->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('categories.index');


    } catch (\Throwable $th) {
      var_dump($request_all);
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $category_id)
  {
    try {
      $category = Category::find($category_id);

      // $email_to_find = $request->user()->email;
      // $current_teacher = Teacher::where('email', $email_to_find)->get()[0];

      // $exam = Exam::find($exam_id);
      // $exam_with_students = Exam::with(['students'])
      //   ->where('id', '=', $exam_id)
      //   ->get()[0]->students;

      // $subject = Subject::find($exam->subject_id);

      // return view(
      //   'teachers.ViewExam',
      //   compact(
      //     'request',
      //     'current_teacher',
      //     'exam',
      //     'subject',
      //     'exam_with_students'
      //   )
      // );

      return view(
        'pages.categories.view',
        compact(
          'category',
          'request'
        )
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function routeShouldBeObsoleted()
  {
    return 'route_should_be_obsoleted';
  }
}
