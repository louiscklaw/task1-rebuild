<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use DB;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class BrandController extends Controller
{


  public function index()
  {
    // $student = Student::find(1);
    // $exam_results = $student->exam_results;
    // dd($exam_results);

    $brands = DB::table('tbl_brands')->get();
    return view('pages.brands.index', compact('brands'));
  }

  public function delete(Request $request, string $brand_id)
  {
    try {
      DB::beginTransaction();

      $exam = Brand::find($brand_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('brands.index')
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
        'pages.brands.create',
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

      $brand = new Brand();

      $brand->name = $validatedData['name'];
      $brand->description = $validatedData['description'];

      $brand->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('brands.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $brand_id)
  {
    try {
      $brand = Brand::find($brand_id);

      return view(
        'pages.brands.edit',
        compact('brand')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $brand_id)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'description' => ''
      ]);

      DB::beginTransaction();

      $brand = Brand::find($brand_id);

      $brand->name = $validatedData['name'];
      $brand->description = $validatedData['description'];

      $brand->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('brands.index');


    } catch (\Throwable $th) {
      var_dump($request_all);
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $brand_id)
  {
    try {
      $brand = Brand::find($brand_id);

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
        'pages.brands.view',
        compact(
          'brand',
          'request'
        )
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function getCount(Request $request)
  {
    $count = Brand::where('name', '!=', '')->count();

    return $count;
  }

  public function routeShouldBeObsoleted()
  {
    return 'route_should_be_obsoleted';
  }
}
