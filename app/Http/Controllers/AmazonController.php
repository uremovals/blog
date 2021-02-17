<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Categories;

class AmazonController extends Controller
{
    public function index(Request $key) {

        $key = $key->key;

        $category_name = Categories::where('category_name', '=', str_replace('-', ' ', ucfirst($key)))->first();

        $category_id = Products::where('category_id', '=', str_replace('-', '+', strtolower($key)))->first();


        if ($category_name === null) {

        return abort(404);

        } else if ($category_id === null) {

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING => '', // Warning: if we don't say "Accept-Encoding: gzip", the SOB's at Amazon will send it gzip-compressed anyway.
            CURLOPT_COOKIE => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => 'https://www.amazon.com/s?k=' . str_replace('-', '+', strtolower($key)) .'',
        ));
        $html = curl_exec($ch);
        @($domd = new \DOMDocument())->loadHTML($html);
        $xpath = new \DomXPath($domd);

        $productnames = $xpath->query("//span[contains(@class, 'a-size-medium a-color-base a-text-normal')]");
        $productimages = $xpath->query("//div[contains(@class, 'a-section aok-relative s-image-fixed-height')]/img/@src");
        $productasins = $xpath->query("//div[contains(@class, 's-result-item s-asin')]/@data-asin");

        if ($productnames->length === 0) {
            $productnames = $xpath->query("//span[contains(@class, 'a-size-base-plus a-color-base a-text-normal')]");
            $productimages = $xpath->query("//div[contains(@class, 'a-section aok-relative s-image-square-aspect')]/img/@src");
            $productasins = $xpath->query("//div[contains(@class, 's-result-item s-asin')]/@data-asin");
        }





        $i = 0;
        foreach( $productasins as $productasin  ) {
            $pasins[] = $productasin->textContent;
            if (++$i == 10) break;
        }

        $i = 0;
        foreach( $productnames as $productname  ) {
            $pnames[] = $productname->textContent;
            if (++$i == 10) break;
        }

        $i = 0;
        foreach( $productimages as $productimage  ) {
            $pimages[] = $productimage->textContent;
            if (++$i == 10) break;
        }

        $pnames_json = serialize($pnames);
        $pimages_json = serialize($pimages);
        $pasins_json = serialize($pasins);

        $parent_id = DB::table('Categories')
            ->select('parent_id')
            ->where('category_name', '=', str_replace('-', ' ', ucfirst($key)))->get();


        $products = new Products ([
            'category_id' => str_replace('-', '+', strtolower($key)),
            'product_name' => $pnames_json,
            'product_image' => $pimages_json,
            'product_asin' => $pasins_json,
            'parent_id' => $parent_id[0]->parent_id,
            ]);

        $products->save();

        $prod_raw = array(
            'name' => ($pnames),
            'image' => ($pimages),
            'asin' => ($pasins),
        );

        foreach ($pimages as $pimage ) {
        }

        DB::table('Categories')
        ->where('category_name', str_replace('-', ' ', ucfirst($key)))
        ->update(['category_image' => $pimage]);

        $related_id = DB::table('products')
        ->select('parent_id')
        ->where('category_id', '=', $key)->get();

        // $categories_related = Categories::where('parent_id', '=', $related_id[0]->parent_id)
        //                                         ->where('parent', '=', null)->get();

        $categories_related = "empty";

        return view('category',
        [ 'products' => $prod_raw,
          'title' => str_replace('+', ' ', ucfirst($key)),
          'related' => $categories_related,
        ]);


        } else {

            $products = Products::where('category_id', '=', str_replace('-', '+', strtolower($key)))->get();

            $products->toArray();


            $related_id = DB::table('products')
            ->select('parent_id')
            ->where('category_id', '=', str_replace('-', '+', strtolower($key)))->get();

            $categories_related = Categories::where('parent_id', '=', $related_id[0]->parent_id)
                                                ->where('parent', '=', null)->get();

            $categories_related->toArray();


            $guide_related = Products::where('parent_id', '=', $related_id[0]->parent_id)
                                        ->where('category_id', '!=', str_replace('-', '+', strtolower($key)))
                                        ->whereNotNull('product_guide')->get();


            $prod = array(
                'name' => unserialize($products[0]->product_name),
                'image' => unserialize($products[0]->product_image),
                'asin' => unserialize($products[0]->product_asin),
                'guide' => $products[0]->product_guide,
            );


        return view('category',
        [ 'products' => $prod,
          'title' => str_replace('+', ' ', ucfirst($key)),
          'related' => $categories_related,
          'guide_related' => $guide_related,
        ]);

        }



    }
}
