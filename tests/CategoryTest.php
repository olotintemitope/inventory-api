<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
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

    public function testGetAllCategories()
    {
        factory(Laztopaz\Model\Category::class)->make();
        $response = $this->call('GET', '/v1/categories');

        $categories = json_decode($response->getContent(), true);

        $this->assertGreaterThan(0, count($categories));
    }

    public function testGetASingleCategory()
    {
        $category = factory(Laztopaz\Model\Category::class)->create();
        $response = $this->call('GET', '/v1/categories/'.$category->id);

        $jsonCategory = json_decode($response->getContent(), true);

        $this->assertEquals($category->id, $jsonCategory['id']);
        $this->assertEquals($category->name, $jsonCategory['name']);
        $this->assertEquals($category->description, $jsonCategory['description']);
        $this->assertGreaterThan(0, count($jsonCategory));
    }

    public function testGetAllProductsByCategory()
    {
        $category = factory(Laztopaz\Model\Category::class)->create();
        $product = factory(Laztopaz\Model\Category::class)->create();

        $response = $this->call('GET', '/v1/categories/'.$category->id.'/products');

        $jsonProducts = json_decode($response->getContent(), true);

        $this->assertGreaterThan(0, count($jsonProducts));
    }

    public function testCreateCategory()
    {
        $category = factory(Laztopaz\Model\Category::class)->create();

        $response = $this->call('POST', '/v1/categories', [
            'name' => 'TimeTable',
            'description' => 'This is a timetable category'
        ]);

        $jsonCategory = json_decode($response->getContent(), true);

        $this->assertGreaterThan(0, count($jsonCategory));
    }
}
