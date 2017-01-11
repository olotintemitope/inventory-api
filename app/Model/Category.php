<?php

namespace Laztopaz\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name', 'description'];

	public function products()
	{
		return $this->hasMany('Laztopaz\Model\Product');
	}

	public function scopeFindById($query, $catId)
	{
		return $query
		    ->where('id', $catId)
		    ->first();
	}

	public function scopeFindAll($query)
	{
		return $query
		    ->orderBy('id', 'asc')
		    ->get();
	}
}