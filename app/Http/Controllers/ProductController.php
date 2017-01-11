<?php

namespace Laztopaz\Http\Controllers;

use Illuminate\Http\Request;
use Laztopaz\Model\Product;

class ProductController extends Controller
{
	public function getAllProducts()
	{
		$products = Product::findAll();

		if ($products->count() > 0) {
			return response()->json($products);
		}

		return response()->json(['message' => 'Products Not Found']);
	}

	public function getProduct($id)
	{
		$product = Product::FindOneById($id);

		if ($product->count() > 0) {
			return response()->json($product);
		}

		return response()->json(['message' => 'Product Not Found']);
	}
}