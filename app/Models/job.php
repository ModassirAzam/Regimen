<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Arr;

class job extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    // protected $fillable = ['employer_id','type','salary'];//for avoiding mass assignment for security reasons so that non authenticated user can't update anything
    protected $guarded = [];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,foreignPivotKey:"job_listing_id");
    }
}














// <?php
// namespace app\Models;
// use Illuminate\Support\Arr;
// use Illuminate\database\Eloquent\Model;

// class job extends Model {
//     protected $table = 'job_listings';

//     protected $fillable = ['type','salary'];//for avoiding mass assignment for security reasons so that non authenticated user can't update anything

// }
