<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Collection;
use App\Colors;
use App\Esas;
use App\Http\Requests;
use App\PrCats;
use App\Brend;
use App\PrColors;
use App\PrDesc;
use App\PrImage;
use App\Products;
use App\PrSuitable;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Image;
use Jenssegers\Date\Date;
use Redirect;
use Response;
use Session;
use Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (isset($_GET['search'])) {
            $sResult = $_GET['search'];
            $results = PrDesc::where('lang', 'az')->where('title', 'LIKE', "%" . $sResult . "%")->get();
            return view('admin.product_list', compact('results'));
        } else {
            $products = Products::where('destroy', 0)->orderBy('created_at', 'desc')->paginate(15);
            return view('admin.product_list', compact('products'));
        }
    }


    public function create(Request $request)
    {
        if ($request->ajax()) {
            $attrs = $leagues = DB::table('attribute_group')
                ->join('attributes', 'attributes.attribute_id', '=', 'attribute_group.id')
                ->join('category_translate', 'category_translate.cat_id', '=', 'attribute_group.cat_id')
                ->where('attribute_group.destroy', 0)
                ->whereIn('category_translate.cat_id', $request->cat_id)
                ->where('category_translate.lang', 'az')
                ->get();
            $attributes = '';
           
            foreach ($attrs as $attr) {
                $attributes .= '<option value="">' . $attr->name . ' >> ' . $attr->group_n_az . '>>> ' . $attr->attribute_n_az . '</option>';
            }
            return $attributes;
        }
         $brands = Brend::all();
        $products = Products::where('destroy', 0)->get();
        $banners = Banner::where('destroy', 0)->get();
        $colors = Colors::all();
        $cats = Category::with('parent', 'children')->where(['parent' => 0])->get();
        return view('admin.product_add', compact('cats', 'colors', 'products', 'banners','brands'));
    }


    public function store(Request $request)
    {
        if ($request['active'] == 'on') {
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }
        if ($request['new'] == 'on') {
            $request['new'] = 1;
        } else {
            $request['new'] = 0;
        }
        if ($request['best'] == 'on') {
            $request['best'] = 1;
        } else {
            $request['best'] = 0;
        }
        if ($request['offers'] == 'on') {
            $request['offers'] = 1;
        } else {
            $request['offers'] = 0;
        }
        if ($request['home'] == 'on') {
            $request['home'] = 1;
        } else {
            $request['home'] = 0;
        }

        if ($request['blog_img']) {
            $file = $request->blog_img;
            $blog_img = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $newname = $blog_img;
            $blog_img = time() . $file->getClientOriginalName();
            $file->move('public/Products', $blog_img);
        } else {
            $blog_img = '';
        }

        if ($request->discount != null && $request->discount != 0 && $request->discount != 0.0) {
            if ($request['type'] == '0') {
                $discount = $request['price'];
                $price = floatval($request['price']) - floatval($request['discount']);
            } else {
                $discount = $request['price'];
                $persentage = floatval($request['price']) * floatval($request['discount']) /100;
                $price = floatval($request['price']) - floatval($persentage);
            }
        } else {
            $price = $request['price'];
            $discount = 0;
        }
        $product_id = Products::create([
            'banner' => $request['banner'],
            'price' => $price,
            'brand'=>$request['brand'],
            'discount' => $discount,
            'discount_amount' => $request['discount'],
            'type'=>$request['type'],
            'stock' => $request['stock'],
            'active' => $request['active'],
            'blog_img' => $blog_img,
            'new' => $request['new'],
            'code' => $request['code'],
            'best' => $request['best'],
            'offer' => $request['offers'],
            'home' => $request['home'],
        ])->id;

        for ($c = 0; $c < count($request->cat); $c++) {
            PrCats::create([
                'pr_id' => $product_id,
                'cat_id' => $request['cat'][$c],
            ]);
        }

        for ($i = 0; $i < count($request->lang); $i++) {
            if ($i != 0) {
                PrDesc::create([
                    'pr_id' => $product_id,
                    'title' => $request['basliq'][0],
                    'description' => $request['xeber_ardi'][0],
                    'blog_text' => $request['blog_text'][0],
                    'lang' => $request['lang'][$i],
                    'slug' => Str::slug($request['basliq'][0] . '-' . $request['lang'][$i])
                ]);
            } else {
                PrDesc::create([
                    'pr_id' => $product_id,
                    'title' => $request['basliq'][$i],
                    'description' => $request['xeber_ardi'][$i],
                    'blog_text' => $request['blog_text'][$i],
                    'lang' => $request['lang'][$i],
                    'slug' => Str::slug($request['basliq'][$i])
                ]);
            }
        }
        if ($request->colors) {
            for ($c = 0; $c < count($request->colors); $c++) {
                PrColors::create([
                    'pr_id' => $product_id,
                    'color_id' => $request['colors'][$c]
                ]);
            }
        }
        if ($request->prs) {
            for ($l = 0; $l < count($request->prs); $l++) {
                PrSuitable::create([
                    'pr_id' => $product_id,
                    'pr' => $request['prs'][$l]
                ]);
            }
        }
        if ($request->img) {
            for ($i = 0; $i < count($request->img); $i++) {
                if ($request['img'][$i]) {
                    $file = $request->img[$i];
                    $file_name = $file->getClientOriginalName();
                    $file_size = round($file->getSize() / 1024);
                    $file_ex = $file->getClientOriginalExtension();
                    $file_mime = $file->getMimeType();
                    $newname = $file_name;
                    $file_name = time() . $file->getClientOriginalName();
                    $file->move('public/Products', $file_name);
                } else {
                    $file_name = '';
                }
                PrImage::create([
                    'pr_id' => $product_id,
                    'img' => $file_name
                ]);
            }
        }

        return \Redirect::to('/product_list')->with('message', ' Məhsul uğurla əlavə edildi');
    }


    public function edit($id)
    {
        $banners = Banner::where('destroy', 0)->get();
        $suitables = Products::where('destroy', 0)->get();
        $categories = Category::all();
        $colors = Colors::all();
        $brands = Brend::all();
        $product = Products::where('id', $id)->first();
        return view('admin.product_edit', compact('product','brands', 'categories', 'colors', 'suitables', 'banners'));
    }

    public function update(Request $request, $id)
    {
        if ($request['active'] == 'on') {
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }
        if ($request['new'] == 'on') {
            $request['new'] = 1;
        } else {
            $request['new'] = 0;
        }
        if ($request['best'] == 'on') {
            $request['best'] = 1;
        } else {
            $request['best'] = 0;
        }
        if ($request['offers'] == 'on') {
            $request['offers'] = 1;
        } else {
            $request['offers'] = 0;
        }
        if ($request['home'] == 'on') {
            $request['home'] = 1;
        } else {
            $request['home'] = 0;
        }

        if ($request['blog_img']) {
            $file = $request->blog_img;
            $blog_img = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();
            $newname = $blog_img;
            $blog_img = time() . $file->getClientOriginalName();
            $file->move('public/Products', $blog_img);
        } else {
            $blog_img = $request['old_blog_img'];
        }

        if ($request['discount'] == null || $request['discount'] == '0' || $request['discount'] == '0.0') {
            $price = $request['price'];
            $discount = $request['discount'];
        } else {
//            $price = $request['discount'];
//            $discount = $request['price'];
            if ($request['type'] == '0') {
                $discount = $request['price'];
                $price = floatval($request['price']) - floatval($request['discount']);
            } else {
                $discount = $request['price'];
                $persentage = floatval($request['price']) * floatval($request['discount']) /100;
                $price = floatval($request['price']) - floatval($persentage);
            }
        }

        if ($request['banner_id']) {
            $request['banner'] = $request['banner_id'];
        }

        Products::where('id', $id)->update([
            
            'banner' => $request['banner'],
            'price' => $price,
            'discount' => $discount,
            'type'=>$request['type'],
            'brand'=>$request['brand'],
            'stock' => $request['stock'],
            'active' => $request['active'],
            'blog_img' => $blog_img,
            'new' => $request['new'],
            'code' => $request['code'],
            'best' => $request['best'],
            'offer' => $request['offers'],
            'home' => $request['home'],
        ]);


        if (!empty($request['cat']) and $request['old_cat']) {
                $diff = array_diff($request['cat'], $request['old_cat']);
                foreach ($diff as $dif) {
                    
                    
                    DB::table('pr_cats')
                        ->where('id', $dif)
                        ->delete();
                }

            } else if (empty($request['old_cat']) and !empty($request['cat'])) {

                foreach ($request['cat'] as $dif) {
                   
                    DB::table('pr_cats')
                        ->where('id', $dif)
                        ->delete();
                }
            }
            
           if(isset($request->category_id)){
            for ($c = 0; $c < count($request->category_id); $c++) {
            PrCats::create([
                'pr_id' => $id,
                'cat_id' => $request['category_id'][$c],
            ]);
        }
        }



        for ($i = 0; $i < count($request->lang); $i++) {
            if ($i != 0) {
                PrDesc::where(['pr_id' => $id, 'lang' => $request['lang'][$i]])->update([
                    'pr_id' => $id,
                    'title' => $request['basliq'][0],
                    'description' => $request['xeber_ardi'][0],
                    'blog_text' => $request['blog_text'][0],
                    'lang' => $request['lang'][$i],
                    'slug' => Str::slug($request['basliq'][0] . '-' . $request['lang'][$i])
                ]);
            } else {
                PrDesc::where(['pr_id' => $id, 'lang' => $request['lang'][$i]])->update([
                    'pr_id' => $id,
                    'title' => $request['basliq'][$i],
                    'description' => $request['xeber_ardi'][$i],
                    'blog_text' => $request['blog_text'][$i],
                    'lang' => $request['lang'][$i],
                    'slug' => Str::slug($request['basliq'][$i])
                ]);
            }

        }

        if (!empty($request['old_img_id']) and $request['img_id']) {
            $diff = array_diff($request['old_img_id'], $request['img_id']);
            foreach ($diff as $dif) {
                $imgname = PrImage::where('id', $dif)->first()->img;
                unlink('./public/Products/' . $imgname);
                DB::table('pr_image')
                    ->where('id', $dif)
                    ->delete();
            }

        } else if (empty($request['img_id']) and !empty($request['old_img_id'])) {

            foreach ($request['old_img_id'] as $dif) {
                $imgname = PrImage::where('id', $dif)->first()->img;
                unlink('./public/Products/' . $imgname);
                DB::table('pr_image')
                    ->where('id', $dif)
                    ->delete();
            }
        }

        if ($request->img) {
            for ($i = 0; $i < count($request->img); $i++) {
                if ($request['img'][$i]) {
                    $file = $request->img[$i];
                    $file_name = $file->getClientOriginalName();
                    $file_size = round($file->getSize() / 1024);
                    $file_ex = $file->getClientOriginalExtension();
                    $file_mime = $file->getMimeType();
                    $newname = $file_name;
                    $file_name = time() . $file->getClientOriginalName();
                    $file->move('public/Products', $file_name);
                    PrImage::create([
                        'pr_id' => $id,
                        'img' => $file_name
                    ]);
                }


            }
        }


        if (!empty($request['old_color_id']) and $request['color_id']) {
            $diff = array_diff($request['old_color_id'], $request['color_id']);
            foreach ($diff as $dif) {
                PrColors::where('color_id', $dif)->delete();
            }

        } else if (empty($request['color_id']) and !empty($request['old_color_id'])) {
            foreach ($request['old_color_id'] as $dif) {
                PrColors::where('color_id', $dif)->delete();
            }
        }
        if ($request->colors) {
            for ($c = 0; $c < count($request->colors); $c++) {
                PrColors::create([
                    'pr_id' => $id,
                    'color_id' => $request['colors'][$c]
                ]);
            }
        }


        if (!empty($request['old_suitables_id']) and $request['suitables_id']) {
            $diff = array_diff($request['old_suitables_id'], $request['suitables_id']);
            foreach ($diff as $dif) {
                PrSuitable::where('pr', $dif)->delete();
            }

        } else if (empty($request['suitables_id']) and !empty($request['old_suitables_id'])) {
            foreach ($request['old_suitables_id'] as $dif) {
                PrSuitable::where('pr', $dif)->delete();
            }
        }
        if ($request->suitables) {
            for ($c = 0; $c < count($request->suitables); $c++) {
                PrSuitable::create([
                    'pr_id' => $id,
                    'pr' => $request['suitables'][$c]
                ]);
            }
        }

        return \Redirect::to('/product_list')
            ->with('message', 'Məhsul uğurla dəyişdirildi');
    }

    public function destroy($id)
    {
        Products::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect('/product_list')->with('message', 'Məhsul silindi');;
    }

    public function showHide(Request $request)
    {

        $active = Products::where('id', $request['pr_id'])->first()->active;

        if ($active == 1) {
            Products::where('id', $request['pr_id'])->update([
                'active' => 0
            ]);
        } else {
            Products::where('id', $request['pr_id'])->update([
                'active' => 1
            ]);
        }

    }
}
