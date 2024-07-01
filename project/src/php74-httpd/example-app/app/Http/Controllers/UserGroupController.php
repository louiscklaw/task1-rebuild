<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class UserGroupController extends Controller
{


  public function index()
  {
    $user_groups = DB::table('tbl_user_groups')->get();
    $user_group_count = UserGroup::all()->count();

    return view(
      'pages.user_groups.index',
      compact(
        'user_groups',
        'user_group_count'
      )
    );
  }

  public function delete(Request $request, string $user_group_id)
  {
    try {
      DB::beginTransaction();

      $exam = UserGroup::find($user_group_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('user_groups.index')
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
        'pages.user_groups.create',
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

      $user_group = new UserGroup();

      $user_group->name = $validatedData['name'];
      $user_group->description = $validatedData['description'];

      $user_group->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('user_groups.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $user_group_id)
  {
    try {
      $user_group = UserGroup::find($user_group_id);

      return view(
        'pages.user_groups.edit',
        compact('user_group')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $user_group_id)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'description' => ''
      ]);

      DB::beginTransaction();

      $user_group = UserGroup::find($user_group_id);

      $user_group->name = $validatedData['name'];
      $user_group->description = $validatedData['description'];

      $user_group->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('user_groups.index');


    } catch (\Throwable $th) {
      var_dump($request_all);
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $user_group_id)
  {
    try {
      $user_group = UserGroup::find($user_group_id);

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
        'pages.user_groups.view',
        compact(
          'user_group',
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
