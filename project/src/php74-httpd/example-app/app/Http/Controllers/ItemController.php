<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\UserRole;
use DB;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ItemController extends Controller
{

  public function index()
  {
    // $student = Student::find(1);
    // $exam_results = $student->exam_results;
    // dd($exam_results);
    try {
      $authId = auth()->id();
      $user = User::find($authId);
      
      
      if ($user->username == 'admin') {
        $items = Item::with(['locations'])->get();
      } else {
        $items = Item::with(['locations'])
          ->whereHas('owners', 
            function ($query) use ($user) {
              $query->where('user_id', $user->id);
            }
          )
          ->get();
      }

      $users = User::all();
      $addresses = Address::all();

      return view(
        'pages.items.index',
        compact(
          'items',
          'addresses',
          'users'
        )
      );
    } catch (\Throwable $th) {
      dd($th);
    }

  }

  public function delete(Request $request, string $item_id)
  {
    try {
      DB::beginTransaction();

      $exam = Item::find($item_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('items.index')
        ->with('success', 'exam has been deleted successfully');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function create(Request $request)
  {
    try {
      $brands = Brand::all();
      $categories = Category::all();
      $addresses = Address::all();
      $users = User::all();
      $user_group = UserGroup::all();
      $user_role = UserRole::all();

      return view(
        'pages.items.create',
        compact(
          'request',
          'brands',
          'addresses',
          'categories',
          'users'
        )
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
        'category_id' => '',
        'brand_id' => '',
        'location_id' => '',
        'owner_id' => '',
        'description' => '',
        'amount' => ''
      ]);

      // return create form
      DB::beginTransaction();

      $item = new Item();

      $item->name = $validatedData['name'];
      $item->description = $validatedData['description'];
      $item->amount = $validatedData['amount'];
      $item->save();

      $new_location_id = $validatedData['location_id'];
      $item->locations()->attach($new_location_id);

      $new_brand_id = $validatedData['brand_id'];
      $item->brands()->attach($new_brand_id);

      $new_category_id = $validatedData['category_id'];
      $item->categories()->attach($new_category_id);

      $new_owner_id = $validatedData['owner_id'];
      $item->owners()->attach($new_owner_id);

      $item->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('items.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $item_id)
  {
    try {
      $item = Item::find($item_id);

      $brands = Brand::all();
      $categories = Category::all();
      $addresses = Address::all();
      $users = User::all();
      $user_group = UserGroup::all();
      $user_role = UserRole::all();

      return view(
        'pages.items.edit',
        compact(
          'item',
          "brands",
          'categories',
          'addresses',
          'users',
          'user_role',
          'user_group'
        )
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $item_id)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'location_id' => '',
        'brand_id' => '',
        'owner_id' => '',
        'category_id' => '',
        'amount' => '',
        'description' => ''
      ]);

      DB::beginTransaction();

      $item = Item::find($item_id);

      $item->name = $validatedData['name'];
      $item->description = $validatedData['description'];
      $item->amount = $validatedData['amount'];

      $new_location_id = $validatedData['location_id'];
      $locations = $item->locations;
      foreach ($locations as $location) {
        $item->locations()->detach($location->id);
      }
      $item->locations()->attach($new_location_id);

      $new_brand_id = $validatedData['brand_id'];
      $brands = $item->brands;
      foreach ($brands as $brand) {
        $item->brands()->detach($brand->id);
      }
      $item->brands()->attach($new_brand_id);

      $new_category_id = $validatedData['category_id'];
      $categories = $item->categories;
      foreach ($categories as $category) {
        $item->categories()->detach($category->id);
      }
      $item->categories()->attach($new_category_id);

      $new_owner_id = $validatedData['owner_id'];
      $owners = $item->owners;
      foreach ($owners as $owner) {
        $item->owners()->detach($owner->id);
      }
      $item->owners()->attach($new_owner_id);

      // done ?
      $item->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('items.index');


    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $item_id)
  {
    try {
      $item = Item::find($item_id);

      return view(
        'pages.items.view',
        compact(
          'item',
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
