<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class IndexController extends Controller
{
        public function index()
        {

        $product_guides = Products::select('product_guide', 'category_id', 'pg_image')
        ->whereNotNull('product_guide')->get();

            $toy = Categories::where('parent_id', '=', 1)
            ->where('parent', '=', null)->get();

            $ele = Categories::where('parent_id', '=', 2)
            ->where('parent', '=', null)->get();

            $boo = Categories::where('parent_id', '=', 3)
            ->where('parent', '=', null)->get();

            $fas = Categories::where('parent_id', '=', 4)
            ->where('parent', '=', null)->get();

            $mov = Categories::where('parent_id', '=', 5)
            ->where('parent', '=', null)->get();

            $car = Categories::where('parent_id', '=', 6)
            ->where('parent', '=', null)->get();

            $foo = Categories::where('parent_id', '=', 7)
            ->where('parent', '=', null)->get();

            $hom = Categories::where('parent_id', '=', 8)
            ->where('parent', '=', null)->get();

            $spo = Categories::where('parent_id', '=', 9)
            ->where('parent', '=', null)->get();

            $hea = Categories::where('parent_id', '=', 10)
            ->where('parent', '=', null)->get();

            $bus = Categories::where('parent_id', '=', 11)
            ->where('parent', '=', null)->get();

        return view('index',[
            'product_guides' => $product_guides,
            'toy' => $toy,
            'ele' => $ele,
            'boo' => $boo,
            'fas' => $fas,
            'mov' => $mov,
            'car' => $car,
            'foo' => $foo,
            'hom' => $hom,
            'spo' => $spo,
            'hea' => $hea,
            'bus' => $bus,
        ]);

        }

        public function categories()
        {

            $toy = Categories::where('parent_id', '=', 1)
            ->where('parent', '=', null)->get();

            $ele = Categories::where('parent_id', '=', 2)
            ->where('parent', '=', null)->get();

            $boo = Categories::where('parent_id', '=', 3)
            ->where('parent', '=', null)->get();

            $fas = Categories::where('parent_id', '=', 4)
            ->where('parent', '=', null)->get();

            $mov = Categories::where('parent_id', '=', 5)
            ->where('parent', '=', null)->get();

            $car = Categories::where('parent_id', '=', 6)
            ->where('parent', '=', null)->get();

            $foo = Categories::where('parent_id', '=', 7)
            ->where('parent', '=', null)->get();

            $hom = Categories::where('parent_id', '=', 8)
            ->where('parent', '=', null)->get();

            $spo = Categories::where('parent_id', '=', 9)
            ->where('parent', '=', null)->get();

            $hea = Categories::where('parent_id', '=', 10)
            ->where('parent', '=', null)->get();

            $bus = Categories::where('parent_id', '=', 11)
            ->where('parent', '=', null)->get();



            return view('categories',
            [
              'toy' => $toy,
              'ele' => $ele,
              'boo' => $boo,
              'fas' => $fas,
              'mov' => $mov,
              'car' => $car,
              'foo' => $foo,
              'hom' => $hom,
              'spo' => $spo,
              'hea' => $hea,
              'bus' => $bus,
            ]);

        }

        public function retailer(Request $key)
        {

            $key = $key->key;

            return view('loadretailer')->with('key', $key);
        }

        public function search()
        {
            return view('post');
        }

        public function autocomplete(Request $request)
        {

            $data = Categories::select("category_name as name","category_image as img")
                    ->where("category_name","LIKE","%{$request->input('query')}%")
                    ->where('parent', '=', null)
                    ->get();

        return response()->json($data);


        }


        public function dataindex(Request $request)
        {

            $categories = Categories::orderBy('updated_at', 'desc')
                        ->where('parent', '=', null)
                        ->get();

            return view('home',
            [
              'data' => $categories,
            ]);
        }

        public function dataAdd(Request $req) {

           $categories = new Categories();
           $categories->category_id = $req->category_id;
           $categories->category_name = ucfirst($req->category_name);
           $categories->parent = $req->parent;
           $categories->parent_id = $req->parent_id;
           $categories->category_image = $req->category_image;
           $categories->save();
           return response()->json($categories);
        }

        public function dataupdate() {

            $closer = Categories::where('category_name', request('category_name'))->update(request()->all());
            return response()->json($post);
        }
}
