<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */

  protected $table = 'tbl_items';

  protected $fillable = ['name', 'description', 'amount'];

  public function locations()
  {
    return $this->belongsToMany('App\Models\Address', 'rel_address_item');
  }

  public function Brands()
  {
    return $this->belongsToMany('App\Models\Brand', 'rel_brand_item');
  }

  public function Owners()
  {
    return $this->belongsToMany('App\Models\User', 'rel_user_item');
  }

  public function Categories()
  {
    return $this->belongsToMany('App\Models\Category', 'rel_category_item');
  }

}
