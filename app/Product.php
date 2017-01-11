<?php

namespace Laztopaz\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'price', 'quantity', 'category_id'];
}
