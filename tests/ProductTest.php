<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testGetAllProducts()
    {
        factory(Laztopaz\Model\Product::class)->make();

        $response = $this->call('GET', '/v1/products');

        $products = json_decode($response->getContent(), true);

        $this->assertGreaterThan(0, count($products));
    }

    public function testGetASingleProduct()
    {
    	$category = factory(Laztopaz\Model\Category::class)->create();
        $product = factory(Laztopaz\Model\Product::class)->create();

        $response = $this->call('GET', '/v1/products/'.$product->id);

        $jsonProduct = json_decode($response->getContent(), true);

        $this->assertEquals($product->id, $jsonProduct['id']);
        $this->assertEquals($product->name, $jsonProduct['name']);
        $this->assertEquals($product->price, $jsonProduct['price']);
        $this->assertEquals($product->quantity, $jsonProduct['quantity']);
        $this->assertGreaterThan(0, count($jsonProduct));
    }

    public function testCreateProduct()
    {
    	$category = factory(Laztopaz\Model\Category::class)->create();
    	$products = factory(Laztopaz\Model\Category::class, 2)->create();

        $response = $this->call('POST', '/v1/products', [
        	'category' => $category->id,
            'name' => 'TimeTable',
            'price' => 200,
            'quantity' => 1
        ]);

        $jsonProduct = json_decode($response->getContent(), true);

        $this->assertGreaterThan(0, count($jsonProduct));
    }
}
