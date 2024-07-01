<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */

  protected $table = 'tbl_orders';

  protected $fillable = ['name', 'description','amount'];

  public function Projects()
  {
    return $this->belongsToMany('App\Models\Project', 'rel_order_project');
  }


  public function Owners()
  {
    return $this->belongsToMany('App\Models\User', 'rel_order_owner');
  }
}
