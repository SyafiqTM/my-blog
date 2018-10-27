<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'title',
    'body',
    'user_id',
    'imglink',
    'biglink',
    'link_rewrite',
  ];

  protected $dates = ['deleted_at'];

  //return route id using link_rewrite
  public function getRouteKeyName() {
       return 'link_rewrite';
   }

  public function scopeFilter($query, $filters) {

       if(isset($filters['month']) && isset($filters['year'])){
          $month = $filters['month'];
          $year = $filters['year'];
          $query->whereMonth('created_at', Carbon::parse($month)->month);
          $query->whereYear('created_at', $year);
       }else{
         return $query;
       }
   }


  public function users()
  {
    return $this->belongsTo('App\User','user_id');
  }
}
