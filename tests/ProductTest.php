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

    public function testSeeAddProductPage()
    {
    	$category = factory(Laztopaz\Model\Category::class)->make();
    	$product = factory(Laztopaz\Model\Product::class)->make();
    
    	$this->visit('/products/add')
    	   ->select(1, 'category')
    	   ->type($product->name, 'name')
    	   ->type($product->price, 'price')
    	   ->type($product->quantity, 'quantity')
    	   ->press('Add')
    	   ->seePageIs('/products/view');
    }

    public function testViewAllProducts()
    {
    	$product = factory(Laztopaz\Model\Product::class)->create();
    	$category = factory(Laztopaz\Model\Category::class)->create();
    	
    	$this->visit('/products/view')
    	    ->see($product->name)
    	    ->see($product->price)
    	    ->see($product->quantity);
    	    //->see($category->name);

    }
}
