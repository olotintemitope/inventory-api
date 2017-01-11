<?php

namespace Laztopaz\Http\Controllers;

use Illuminate\Http\Request;
use Laztopaz\Model\Category;

class CategoryController extends Controller
{
	public function getAllCategories()
	{
		$categories = Category::findAll();

		if (!is_null($categories)) {
			return response()->json($categories);
		}

		return response()->json(['message' => 'Categories not found']);
	}

	public function getCategory($id)
	{
		$category = Category::FindById($id);

		return response()->json($category);
	}
}
