<?php

namespace Laztopaz\Http\Controllers;

use Illuminate\Http\Request;
use Laztopaz\Model\Product;

class ProductController extends Controller
{
	public function getAllProducts()
	{
		$products = Product::findAll();
	}
}