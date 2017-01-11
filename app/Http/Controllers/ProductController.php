<?php
namespace Laztopaz\Http\Controllers;

use Laztopaz\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laztopaz\Model\Category;

class ProductController extends Controller
{
	public function showItemPage(Request $request, Response $response)
	{
		$categories = Category::findAll();

		return view('Product.add_product', compact('categories'));
	}

	public function addItem(Request $request, Response $response)
	{
		$product = Product::create([
			'category_id' => $request->category,
			'name' => $request->name,
			'price' => $request->price,
			'quantity' => $request->quantity
		]);

		return redirect()->route('list_products'); 
	}

	public function listProducts(Request $request)
	{
		$products = Product::findAll();

		return view('Product.list_products', compact('products'));
	}

	public function searchProduct(Request $request)
	{
		$categories = Category::findAll();
		$products = [];
		$category = $request->category;
		$keyword = $request->search;

		if ($keyword == '') {
			return view('Product.search_product', compact('categories', 'products'));
		}

		$products = Category::find($category)
		    ->products()
		    ->where('name', 'like', '%'.strtolower(urldecode($keyword)).'%')
		    ->orWhere('price', 'like', '%'.urldecode($keyword).'%')
		    ->paginate(10);


		return view('Product.search_product', compact('categories', 'products'));
	}
}