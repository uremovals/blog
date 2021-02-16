<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $table = "Categories";

    protected $fillable = ["category_id", "category_name", "parent", "parent_id", "category_image"];

}
