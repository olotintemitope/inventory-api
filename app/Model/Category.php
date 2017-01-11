<?php
namespace Laztopaz\Model;

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
}