<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Logo;
use App\Models\About;

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
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        return view('frontend.pages.home',$data);
    }

    public function gallary()
    {
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        return view('frontend.pages.gallary',$data);
    }
}
