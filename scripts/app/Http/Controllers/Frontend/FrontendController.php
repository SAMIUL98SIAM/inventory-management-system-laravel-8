<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Logo;
use App\Models\About;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $data['logo'] = Logo::first();
        $data['sliders'] = Slider::where('status',1)->get();;
        $data['contact'] = Contact::first();

        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        //$data['products'] = Product::orderBy('id','desc')->get();
        $data['products'] = Product::orderBy('id','desc')->paginate(6);
        return view('frontend.layouts.master.home',$data);
    }

    public function product_list()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();

        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        //$data['products'] = Product::orderBy('id','desc')->get();
        $data['products'] = Product::orderBy('id','desc')->paginate(6);
        return view('frontend.layouts.master.product-list',$data);
    }

    public function categoryWiseProduct($category_id)
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();

        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();

        //$data['products'] = Product::where('category_id',$category_id)->orderBy('id','desc')->get();
        $data['products'] = Product::where('category_id',$category_id)->orderBy('id','desc')->paginate(6);
        return view('frontend.layouts.master.category-wise-product',$data);
    }
    public function brandWiseProduct($brand_id)
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();

        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();

        //$data['products'] = Product::where('brand_id',$brand_id)->orderBy('id','desc')->get();
        $data['products'] = Product::where('brand_id',$brand_id)->orderBy('id','desc')->paginate(6);
        return view('frontend.layouts.master.brand-wise-product',$data);
    }


    public function product_details($slug)
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['product'] = Product::where('slug',$slug)->first();

        $data['product_sub_images'] = ProductSubImage::where('product_id',$data['product']->id)->get();
        $data['product_colors'] = ProductColor::where('product_id',$data['product']->id)->get();
        $data['product_sizes'] = ProductSize::where('product_id',$data['product']->id)->get();

        return view('frontend.layouts.master.product-detail',$data);
    }


    public function contact_us()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.layouts.master.contact-us',$data);
    }
    public function about_us()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        return view('frontend.layouts.master.about-us',$data);
    }


    public function find_product(Request $request)
    {
        $slug = $request->slug ;
        $data['product'] = Product::where('slug',$slug)->first();

        if ($data['product']) {
            $data['logo'] = Logo::first();
            $data['contact'] = Contact::first();
            $data['product'] = Product::where('slug',$slug)->first();
            $data['product_sub_images'] = ProductSubImage::where('product_id',$data['product']->id)->get();
            $data['product_colors'] = ProductColor::where('product_id',$data['product']->id)->get();
            $data['product_sizes'] = ProductSize::where('product_id',$data['product']->id)->get();
            return view('frontend.layouts.master.find-product',$data);
        }
        else
        {
            return redirect()->back()->with('error','no product does not match');
        }

    }

    public function get_product(Request $request)
    {
        $slug = $request->slug ;
        $productData = DB::table('products')->where('slug','LIKE','%'.$slug.'%')->get();

        $html = '';
        $html .= '<div><ul>';
        if($productData)
        {
            foreach ($productData as $key => $v) {
                $html .= '<li>'.$v->slug.'</li>';
            }
        }
        $html .= '</div></ul>';
        return response()->json($html);
    }
}
