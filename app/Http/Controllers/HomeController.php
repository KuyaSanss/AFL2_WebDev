<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Testimonial;

class HomeController extends Controller
{
      public function index()
   {
       $testimonials = Testimonial::active()->limit(12)->get();
       $faqs         = Faq::active()->get();

       return view('home', compact('testimonials', 'faqs'));
   }
}