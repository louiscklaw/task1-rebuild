<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */

  protected $table = 'tbl_projects';

  protected $fillable = ['name', 'description'];

  public function Orders()
  {
    return $this->belongsToMany('App\Models\Order', 'rel_order_project');
  }

  public function Owners()
  {
    return $this->belongsToMany('App\Models\User', 'rel_project_owner');
  }
}
