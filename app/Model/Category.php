<?php
namespace Laztopaz\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['id', 'name', 'description'];

	public function products()
	{
		return $this->hasMany('Laztopaz\Model\Product');
	}

	public function scopefindAll($query)
	{
		return $query
		    ->orderBy('id', 'asc')
		    ->get();
	}

	public function scopeFindOneByCategoryId($query, $id)
	{
		return $query
		    ->where('id', $id)
		    ->first();
	}

	public function scopeFindProductCategory($query, $catId)
	{
		return $query
		    ->where('id', $id)
		    ->first()
		    ->products();
		    ->get();
	}
}