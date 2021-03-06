<?php

use App\Category;
use App\Label;
use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create(['name' => 'gadgets' ]);
        $category2 = Category::create(['name' => 'clothing' ]);
        $category3 = Category::create(['name' => 'appliances' ]);
        $label1 = Label::create(['name' => 'new' ]);
        $label2 = Label::create(['name' => 'hot' ]);
        $label3 = Label::create(['name' => 'special' ]);

        $product1 = Product::create([
            'name' => 'EarpodsX30',
            'image' => 'images/1.jpg',
            'price' => '450.00',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'featured' =>true,
            'category_id' => $category1->id,
            'label_id' => $label1->id,            
        ]);
        $product2 = Product::create([
            'name' => 'T-shirt101',
            'image' => 'images/2.jpg',
            'price' => '350.00',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'featured' =>true,
            'category_id' => $category2->id,
            'label_id' => $label2->id,            
        ]);
        $product3 = Product::create([
            'name' => 'GameConsole',
            'image' => 'images/3.jpg',
            'price' => '1549.99',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'featured' =>true,
            'category_id' => $category3->id,
            'label_id' => $label3->id,            
        ]);
        $product4 = Product::create([
            'name' => 'GameConsole',
            'image' => 'images/3.jpg',
            'price' => '1549.99',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'featured' =>true,
            'category_id' => $category1->id,
            'label_id' => $label2->id,            
        ]);
        $product5 = Product::create([
            'name' => 'Oxygen Shirt',
            'image' => 'images/4.jpg',
            'price' => '799.99',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'featured' =>true,
            'category_id' => $category3->id,
            'label_id' => $label3->id,            
        ]);
        $product6 = Product::create([
            'name' => 'Headphone',
            'image' => 'images/3.jpg',
            'price' => '1549.99',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'featured' =>true,
            'category_id' => $category2->id,
            'label_id' => $label1->id,            
        ]);
        $product7 = Product::create([
            'name' => 'Electricfan365',
            'image' => 'images/3.jpg',
            'price' => '3000.00',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'featured' =>true,
            'category_id' => $category3->id,
            'label_id' => $label2->id,            
        ]);
        $product8 = Product::create([
            'name' => 'DVD',
            'image' => 'images/3.jpg',
            'price' => '5999.99',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab.',
            'featured' =>true,
            'category_id' => $category1->id,
            'label_id' => $label3->id,            
        ]);

    }
}
