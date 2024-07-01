<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\UserRole;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  // public function __construct()
  // {
  //     $this->middleware('auth');
  // }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\View\View
   */
  public function index()
  {
    $user_role_count = UserRole::where('name', '!=', '')->count();
    $user_group_count = UserGroup::where('name', '!=', '')->count();
    $user_count = User::where('email', '!=', '')->count();
    $project_count = Project::where('name', '!=', '')->count();
    // $product_count = Product::where('name', '!=', '')->count();
    $order_count = Order::where('name', '!=', '')->count();
    $item_count = Item::where('name', '!=', '')->count();
    $category_count = Category::where('name', '!=', '')->count();
    $brand_count = Brand::where('name', '!=', '')->count();
    $address_count = Address::where('name', '!=', '')->count();

    return view(
      'pages.dashboard',
      compact(
        'user_role_count',
        'user_group_count',
        'user_count',
        'project_count',
        'order_count',
        'item_count',
        'category_count',
        'brand_count',
        'address_count',
      )
    );
  }
}
