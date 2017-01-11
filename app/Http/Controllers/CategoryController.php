<?php

namespace Laztopaz\Http\Controllers;

use Illuminate\Http\Request;
use Laztopaz\Model\Category;

class CategoryController extends Controller
{
	public function getAllCategories()
	{
		$categories = Category::findAll();

		return response()->json($categories);
	}

	public function getCategory($id)
	{
		$category = Category::FindById($id);

		return response()->json($category);
	}
}
