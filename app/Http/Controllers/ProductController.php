<?php

namespace Laztopaz\Http\Controllers;

use Illuminate\Http\Request;
use Laztopaz\Model\Product;
use Laztopaz\Model\Category;

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

    public function saveProduct(Request $request)
    {
        if (
            $request->has('name') && 
            $request->has('price') && 
            $request->has('quantity') &&
            $request->has('category')
        ) {
            $category = Category::find($request->has('category'));
            if ($category->count() > 0) {
                $product = Product::Create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'category_id' => $request->quantity,
                ]);

                if ($product->count() > 0) {
                    return response()->json($product, 200);
                }
            }
        }

        return response()->json(['message' => 'Opps Can\'t create Product'], 400);
    }
>>>>>>> ft-create-tests
}