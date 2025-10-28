<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {

    return view('front.index');

    }

    public function shop(){
        return view('front.shop');
    }

    public function cart() {
        return view('front.cart');
    }

    public function checkout() {
        return view('front.checkout');
    }

    public function testimonial() {
        return view('front.testimonial');
    }

    public function contact() {
        return view('front.contact');
    }
}
