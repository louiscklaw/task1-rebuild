<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
  public function show(Request $request)
  {
    $user_id = $request->user()->id;

    $user = User::where('id', $user_id)->with(['projects', 'orders', 'items'])->first();

    $role_id = $request->user()->roles;
    $role = UserRole::where('id', $role_id)->first();
    $role_name = $role->name;

    $status = $request->user()->status;
    $user_status = $status == 1 ? "enabled" : "disabled";

    return view(
      'pages.user-profile',
      compact(
        'user',
        'role_name',
        'user_status'
      )
    );
  }

  public function update(Request $request)
  {
    var_dump($request);

    try {
      $attributes = $request->validate([
        'username' => ['required', 'max:255', 'min:2'],
        'firstname' => ['max:100'],
        'lastname' => ['max:100'],
        'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id),],
        'address' => ['max:100'],
        'city' => ['max:100'],
        'country' => ['max:100'],
        'postal' => ['max:100'],
        'about' => ['max:255']
      ]);

      auth()->user()->update([
        'username' => $request->get('username'),
        'firstname' => $request->get('firstname'),
        'lastname' => $request->get('lastname'),
        'email' => $request->get('email'),
        'address' => $request->get('address'),
        'city' => $request->get('city'),
        'country' => $request->get('country'),
        'postal' => $request->get('postal'),
        'about' => $request->get('about')
      ]);
      return back();

    } catch (\Throwable $th) {
      echo $th->getMessage();

    }
  }

  public function self_update(Request $request)
  {

    try {
      $attributes = $request->validate([
        'username' => ['required', 'max:255', 'min:2'],
        'firstname' => ['max:100'],
        'lastname' => ['max:100'],
        'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id),],
        'address' => ['max:100'],
        'city' => ['max:100'],
        'country' => ['max:100'],
        'postal' => ['max:100'],
        'about' => ['max:255']
      ]);

      auth()->user()->update([
        'username' => $request->get('username'),
        'firstname' => $request->get('firstname'),
        'lastname' => $request->get('lastname'),
        'email' => $request->get('email'),
        'address' => $request->get('address'),
        'city' => $request->get('city'),
        'country' => $request->get('country'),
        'postal' => $request->get('postal'),
        'about' => $request->get('about')
      ]);
      return back();

    } catch (\Throwable $th) {
      echo $th->getMessage();

    }
  }
}
