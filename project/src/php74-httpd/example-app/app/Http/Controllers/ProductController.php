<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DB;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{


  public function index()
  {
    // $student = Student::find(1);
    // $exam_results = $student->exam_results;
    // dd($exam_results);

    $products = DB::table('tbl_products')->get();
    return view('pages.products.index', compact('products'));
  }

  public function delete(Request $request, string $product_id)
  {
    try {
      DB::beginTransaction();

      $exam = Product::find($product_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('products.index')
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
        'pages.products.create',
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

      $product = new Product();

      $product->name = $validatedData['name'];
      $product->description = $validatedData['description'];

      $product->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('products.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $product_id)
  {
    try {
      $product = Product::find($product_id);

      return view(
        'pages.products.edit',
        compact('product')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $product_id)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'description' => ''
      ]);

      DB::beginTransaction();

      $product = Product::find($product_id);

      $product->name = $validatedData['name'];
      $product->description = $validatedData['description'];

      $product->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('products.index');


    } catch (\Throwable $th) {
      var_dump($request_all);
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $product_id)
  {
    try {
      $product = Product::find($product_id);

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
        'pages.products.view',
        compact(
          'product',
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
