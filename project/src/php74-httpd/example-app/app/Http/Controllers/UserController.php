<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGroup;
use App\Models\UserRole;
use DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class UserController extends Controller
{


  public function index()
  {
    // $users = DB::table('users')->get();
    $users = User::with([
      'projects',
      'items',
      'orders',
      'usergroups'
    ])->get();

    $user_count = User::where('email', '!=', '')->count();
    $user_roles = UserRole::all();
    $user_groups = UserGroup::all();

    return view(
      'pages.users.index',
      compact(
        'users',
        'user_roles',
        'user_count',
        'user_groups'
      )
    );
  }

  public function delete(Request $request, string $category_id)
  {
    try {
      DB::beginTransaction();

      $exam = User::find($category_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('users.index')
        ->with('success', 'exam has been deleted successfully');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function create(Request $request)
  {
    try {
      $user_roles = UserRole::all();

      return view(
        'pages.users.create',
        compact('request', 'user_roles')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function store(Request $request)
  {
    try {
      $validatedData = $request->validate([
        'username' => '',
        'postal' => '',
        'lastname' => '',
        'firstname' => '',
        'address' => '',
        'country' => '',
        'city' => '',
        'email' => '',
        'password' => '',
        'about' => ''
      ]);


      // return create form
      DB::beginTransaction();

      $user = new User();

      $user->username = $validatedData['username'];
      $user->postal = $validatedData['postal'];
      $user->lastname = $validatedData['lastname'];
      $user->firstname = $validatedData['firstname'];
      $user->address = $validatedData['address'];
      $user->country = $validatedData['country'];
      $user->city = $validatedData['city'];
      $user->email = $validatedData['email'];
      $user->about = $validatedData['about'];
      $user->password = $validatedData['password'];

      $user->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('users.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $user_id)
  {
    try {
      $user = User::where('id', $user_id)->with([
        'projects',
        'items',
        'orders',
        'usergroups'
      ])->first();
      $user_roles = UserRole::all();
      $user_groups = UserGroup::all();

      // dd($user);

      return view(
        'pages.users.edit',
        compact(
          'user',
          'user_groups',
          'user_roles',
        )
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $user_id)
  {
    try {
      $validatedData = $request->validate([
        'username' => '',
        'firstname' => '',
        'lastname' => '',
        'email' => '',
        'address' => '',
        'city' => '',
        'country' => '',
        'postal' => '',
        'about' => '',
        'roles' => '',
        'usergroup_id' => ''
      ]);

      DB::beginTransaction();

      $user = User::find($user_id);
      $user->username = $validatedData['username'];
      $user->firstname = $validatedData['firstname'];
      $user->lastname = $validatedData['lastname'];
      $user->email = $validatedData['email'];
      $user->address = $validatedData['address'];
      $user->city = $validatedData['city'];
      $user->country = $validatedData['country'];
      $user->postal = $validatedData['postal'];
      $user->about = $validatedData['about'];

      $user->roles = $validatedData['roles'];

      $user->save();

      foreach ($user->usergroups as $user_group) {
        $user->usergroups()->detach($user_group->id);
      }
      $user->usergroups()->attach($validatedData['usergroup_id']);

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('users.index');


    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }
  public function enable(Request $request, string $user_id)
  {
    try {
      $request_all = $request->all();

      DB::beginTransaction();

      $user = User::find($user_id);
      $user->status = 1;

      $user->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('users.index');


    } catch (\Throwable $th) {
      var_dump($request_all);
      echo $th->getMessage();
    }
  }
  public function disable(Request $request, string $user_id)
  {
    try {
      $request_all = $request->all();

      DB::beginTransaction();

      $user = User::find($user_id);
      $user->status = 0;

      $user->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('users.index');

    } catch (\Throwable $th) {
      var_dump($request_all);
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $user_id)
  {
    try {
      $user = User::where('id', $user_id)->with(['usergroups'])->get()[0];

      return view(
        'pages.users.view',
        compact(
          'user',
          'request',
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
