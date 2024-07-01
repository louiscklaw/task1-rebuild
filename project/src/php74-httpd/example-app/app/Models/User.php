<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'username',
    'firstname',
    'lastname',
    'email',
    'password',
    'address',
    'city',
    'country',
    'postal',
    'about'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * Always encrypt the password when it is updated.
   *
   * @param $value
   * @return string
   */
  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = bcrypt($value);
  }

  public function Items()
  {
    return $this->belongsToMany('App\Models\Item', 'rel_user_item');
  }

  public function Projects()
  {
    return $this->belongsToMany('App\Models\Project', 'rel_project_owner');
  }

  public function UserGroups()
  {
    return $this->belongsToMany('App\Models\UserGroup', 'rel_user_user_group');
  }

  public function Orders()
  {
    return $this->belongsToMany('App\Models\Order', 'rel_order_owner');
  }
}
