<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function foodBeverage() {
        $products = [
            ['name' => 'Tempe', 'price' => 1000],
            ['name' => 'Tahu', 'price' => 1000],
            ['name' => 'Sambal', 'price' => 1000]
        ];
        $label = 'Food and Beverage';
        return view('products.show', compact('products', 'label'));
    }
    public function beautyHealth() {
        $products = [
            ['name' => 'Skincare', 'price' => 100000],
            ['name' => 'Sunscreen', 'price' => 30000],
            ['name' => 'Facewash', 'price' => 35000]
        ];
        $label = 'Beauty and Health';
        return view('products.show', compact('products', 'label'));
    }
    public function homeCare() {
        $products = [
            ['name' => 'Sabun Lantai', 'price' => 20000],
            ['name' => 'Pengharum Ruangan', 'price' => 25000],
            ['name' => 'Sapu', 'price' => 18000]
        ];
        $label = 'Home Care';
        return view('products.show', compact('products', 'label'));
    }
    public function babyKid() {
        $products = [
            ['name' => 'Susu Formula', 'price' => 100000],
            ['name' => 'Popok Bayi', 'price' => 40000],
            ['name' => 'Pakaian Anak', 'price' => 75000]
        ];
        $label = 'Baby and Kid';
        return view('products.show', compact('products', 'label'));
    }
}
