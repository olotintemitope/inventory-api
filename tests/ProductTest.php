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
}
