<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use DB;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class OrderController extends Controller
{


  public function index()
  {
    // $student = Student::find(1);
    // $exam_results = $student->exam_results;
    // dd($exam_results);

    $orders = Order::with(['projects'])->get();
    return view('pages.orders.index', compact('orders'));
  }

  public function delete(Request $request, string $item_id)
  {
    try {
      DB::beginTransaction();

      $exam = Order::find($item_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('orders.index')
        ->with('success', 'exam has been deleted successfully');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function create(Request $request)
  {
    try {
      $projects = Project::all();

      return view(
        'pages.orders.create',
        compact('request', 'projects')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function store(Request $request)
  {
    try {
      $validatedData = $request->validate([
        'name' => '',
        'description' => '',
        'project_id' => '',
        'amount' => '',
        'status' => ''
      ]);

      // return create form
      DB::beginTransaction();

      $order = new Order();
      $order->save();

      $order->name = $validatedData['name'];
      $order->description = $validatedData['description'];
      $order->status = $validatedData['status'];
      $order->amount = $validatedData['amount'];

      $new_project_id = $validatedData['project_id'];
      $order->projects()->attach($new_project_id);

      $order->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('orders.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $order_id)
  {
    try {
      $order = Order::where('id', $order_id)->with(['projects'])->get()[0];
      $projects = Project::all();

      return view(
        'pages.orders.edit',
        compact('order', 'projects', )
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $order_id)
  {
    try {
      $validatedData = $request->validate([
        'name' => '',
        'description' => '',
        "project_id" => '',
        "amount" => '',
        'status' => ""
      ]);

      DB::beginTransaction();

      $item = Order::where('id', $order_id)->get()[0];

      $item->name = $validatedData['name'];
      $item->description = $validatedData['description'];
      $item->status = $validatedData['status'];
      $item->amount = $validatedData['amount'];

      $new_project_id = 1;
      $projects = $item->projects;
      
      foreach ($projects as $project) {
        $item->projects()->detach($project->id);
      }
      $item->projects()->attach($new_project_id);

      $item->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('orders.index');


    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $order_id)
  {
    try {
      $order = Order::where('id', $order_id)->with(['projects'])->get()[0];

      return view(
        'pages.orders.view',
        compact(
          'order',
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
