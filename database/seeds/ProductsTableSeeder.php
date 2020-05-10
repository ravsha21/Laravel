<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => '1',
                'name' => 'Rice balls',
                'description' => 'They are a great snack and perfect for lunch boxes.',
                'image' => 'rice_ball.jpg',
                'price' => 10.00,
                
            ],
            [
                'category_id' => '2',
                'name' => 'Happy Frog Burger',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'happy-frog-burger.jpg',
                'price' => 10.00,
            ],
            [
                'category_id' => '1',
                'name' => 'Egg Bread',
                'description' => 'The carbs give your body energy to get started and your brain the fuel it needs to take on the day. Protein gives you staying power and helps you feel full until your next meal.',
                'image' => 'bread_egg.jpg',
                'price' => 10.00,
            ],
            [
                'category_id' => '1',
                'name' => 'Bread Sandwich',
                'description' => 'The carbs give your body energy to get started and your brain the fuel it needs to take on the day. Protein gives you staying power and helps you feel full until your next meal.',
                'image' => 'Sandwich-Bread.jpg',
                'price' => 6.50,
            ],
            [
                'category_id' => '1',
                'name' => 'Bread Jam',
                'description' => 'The carbs give your body energy to get started and your brain the fuel it needs to take on the day. Protein gives you staying power and helps you feel full until your next meal.',
                'image' => 'bread_jam.jpg',
                'price' => 5.00,
            ],
            [
                'category_id' => '1',
                'name' => 'Bunny Pancakes',
                'description' => 'The carbs give your body energy to get started and your brain the fuel it needs to take on the day. Protein gives you staying power and helps you feel full until your next meal.',
                'image' => 'bunny-pancakes.jpg',
                'price' => 7.00,
            ],
            [
                'category_id' => '1',
                'name' => 'Cute Fox Pancake',
                'description' => 'The carbs give your body energy to get started and your brain the fuel it needs to take on the day. Protein gives you staying power and helps you feel full until your next meal.',
                'image' => 'cute-fox.jpg',
                'price' => 7.00,
            ],
            [
                'category_id' => '1',
                'name' => 'Butterfly Sandwich',
                'description' => 'The carbs give your body energy to get started and your brain the fuel it needs to take on the day. Protein gives you staying power and helps you feel full until your next meal.',
                'image' => 'butterfly_sandwich.jpg',
                'price' => 10.00,
            ],
            [
                'category_id' => '1',
                'name' => 'Pancake',
                'description' => 'The carbs give your body energy to get started and your brain the fuel it needs to take on the day. Protein gives you staying power and helps you feel full until your next meal.',
                'image' => 'pancake.jpeg',
                'price' => 7.00,
            ],
            [
                'category_id' => '2',
                'name' => 'Pikachu Rice',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'pikachu_rice.jpg',
                'price' => 10.00,
            ],
            [
                'category_id' => '2',
                'name' => 'Pasta Salad',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'pasta-salad.jpg',
                'price' => 8.00,
            ],
            [
                'category_id' => '2',
                'name' => 'Kyaraben Meal',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'kyaraben.jpg',
                'price' => 10.50,
            ],
            [
                'category_id' => '2',
                'name' => 'Mini Sandwiches',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'mini-sandwiches.jpg',
                'price' => 10.50,
            ],
            [
                'category_id' => '2',
                'name' => 'Turtles Burgers',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'turtles-burgers.jpg',
                'price' => 5.00,
            ],
            [
                'category_id' => '2',
                'name' => 'Pancake',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'pan-cake.jpeg',
                'price' => 5.00,
            ],
            [
                'category_id' => '2',
                'name' => 'Kitty Oats',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'kitty-oats.jpg',
                'price' => 3.50,
            ],
            [
                'category_id' => '3',
                'name' => 'Pikachu Meal',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'pikachu_dinner.jpg',
                'price' => 10.00,
            ],
            [
                'category_id' => '3',
                'name' => 'Colourful Pasta',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'colourful-pasta.jpg',
                'price' => 10.00,
            ],
            [
                'category_id' => '3',
                'name' => 'Colourful Rice',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'colourful-rice.jpg',
                'price' => 10.00,
            ],
            [
                'category_id' => '3',
                'name' => 'Corn Pizza',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'corn-pizza.jpg',
                'price' => 5.00,
            ],
            [
                'category_id' => '3',
                'name' => 'Nachos',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'nachos.jpg',
                'price' => 7.00,
            ],
            [
                'category_id' => '3',
                'name' => 'Noodles',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'noodles.jpg',
                'price' => 7.50,
            ],
            [
                'category_id' => '3',
                'name' => 'Monster Burger',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'monster-burger.jpg',
                'price' => 5.00,
            ],
            [
                'category_id' => '3',
                'name' => 'Veg Noodles',
                'description' => 'Fresh and Healthy. Kids love the shape of it and it is tasty as well.',
                'image' => 'veg_noodles.jpg',
                'price' => 7.50,
            ],
        ]);
    }
}
