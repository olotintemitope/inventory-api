<?php

namespace Laztopaz\Http\Controllers;

use Illuminate\Http\Request;
use Laztopaz\Model\Category;

class CategoryController extends Controller
{
	public function getAllCategories()
	{
		$categories = Category::findAll();

		if ($categories->count()) {
			return response()->json($categories, 200);
		}

		return response()->json(['message' => 'Categories Not Found'], 404);
	}

	public function getCategory($id)
	{
		$category = Category::FindById($id);

		if ($category->count()) {
			return response()->json($category, 200);
		}

		return response()->json(['message' => 'Category Not Found'], 404);
	}

	public function getProductsByCategory($id)
	{
		$category = Category::FindById($id);

		if ($category->count() > 0) {
			$categoryWithProducts = $category->products();
			if ($categoryWithProducts->count() > 0) {
				return response()->json($categoryWithProducts, 200);
			}
		}

		return response()->json(['message' => 'Products Not Found'], 404);
	}
}
