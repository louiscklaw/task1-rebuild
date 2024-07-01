<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use DB;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class UserRoleController extends Controller
{

  public function index()
  {
    // $student = Student::find(1);
    // $exam_results = $student->exam_results;
    // dd($exam_results);

    $user_roles = DB::table('tbl_user_roles')->get();
    $user_role_count = UserRole::where('name', '!=', '')->count();

    return view(
      'pages.user_roles.index',
      compact(
        'user_roles',
        'user_role_count'
      )
    );
  }

  public function delete(Request $request, string $user_role_id)
  {
    try {
      DB::beginTransaction();

      $exam = UserRole::find($user_role_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('user_roles.index')
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
        'pages.user_roles.create',
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

      $user_role = new UserRole();

      $user_role->name = $validatedData['name'];
      $user_role->description = $validatedData['description'];

      $user_role->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('user_roles.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $user_role_id)
  {
    try {
      $user_role = UserRole::find($user_role_id);

      return view(
        'pages.user_roles.edit',
        compact('user_role')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $user_role_id)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'description' => ''
      ]);

      DB::beginTransaction();

      $user_role = UserRole::find($user_role_id);

      $user_role->name = $validatedData['name'];
      $user_role->description = $validatedData['description'];

      $user_role->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('user_roles.index');


    } catch (\Throwable $th) {
      var_dump($request_all);
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $user_role_id)
  {
    try {
      $user_role = UserRole::find($user_role_id);

      return view(
        'pages.user_roles.view',
        compact(
          'user_role',
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
