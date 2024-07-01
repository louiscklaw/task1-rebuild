<?php

namespace App\Http\Controllers;

use App\Models\Address;
use DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AddressController extends Controller
{


  public function index()
  {
    // $student = Student::find(1);
    // $exam_results = $student->exam_results;
    // dd($exam_results);

    $addresses = DB::table('tbl_addresses')->get();
    return view('pages.addresses.index', compact('addresses'));
  }

  public function delete(Request $request, string $address_id)
  {
    try {
      DB::beginTransaction();

      $exam = Address::find($address_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('addresses.index')
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
        'pages.addresses.create',
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

      $address = new Address();

      $address->name = $validatedData['name'];
      $address->description = $validatedData['description'];

      $address->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('addresses.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $address_id)
  {
    try {
      $address = Address::find($address_id);

      return view(
        'pages.addresses.edit',
        compact('address')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $address_id)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'description' => ''
      ]);

      DB::beginTransaction();

      $address = Address::find($address_id);

      $address->name = $validatedData['name'];
      $address->description = $validatedData['description'];

      $address->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('addresses.index');


    } catch (\Throwable $th) {
      var_dump($request_all);
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $address_id)
  {
    try {
      $address = Address::find($address_id);

      return view(
        'pages.addresses.view',
        compact(
          'address',
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
