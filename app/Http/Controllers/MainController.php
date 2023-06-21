<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\SliderService;
use App\Services\VendorService;
use App\Services\ProductService;
class MainController extends Controller
{

    public function main()
    {

        return view('main');
    }
}
