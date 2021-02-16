<?php

namespace App\Http\Controllers;
use App\Models\Products;

class SitemapController extends Controller
{

public function products()
{
  $products = Products::all();



  return response()->view('/sitemap', [
      'products' => $products,
  ])->header('Content-Type', 'text/xml');
}

}
