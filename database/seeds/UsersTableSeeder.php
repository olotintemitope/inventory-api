<?php
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Laztopaz\Model\Category::class, 5)->create();
    	factory(Laztopaz\Model\Product::class, 5)->create();
    }
}