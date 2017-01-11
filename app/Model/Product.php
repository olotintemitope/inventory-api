<?php
namespace Laztopaz\Model;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable =  ['name', 'price', 'quantity', 'category_id'];
    public function category()
    {
        return $this->belongsTo('Laztopaz\Model\Category');
    }
    public function scopeFindOneByCategory($query, $catId)
    {
        return $query
            ->where('category_id', $catId)
            ->first();
    }
    public function scopeFindOneById($query, $id)
    {
        return $query
            ->where('id', $id)
            ->first();
    }
    public function scopeFindAll($query)
    {
        return $query
            ->orderBy('id', 'desc')
            ->get();
    }
}