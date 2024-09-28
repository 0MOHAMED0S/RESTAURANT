<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Chef;
use App\Models\chefs;
use App\Models\contactus;
use App\Models\gallary;
use App\Models\GallaryImage;
use App\Models\Ietm;
use App\Models\menu;
use App\Models\section;
use App\Models\welcome;
use Illuminate\Http\Request;

class Yummy extends Controller
{
    public function index(){
        $welcomes=welcome::first();
        $aboutus=AboutUs::first();
        $menus=Ietm::get();
        $sections=section::get();
        $chefs=Chef::get();
        $contactus=contactus::first();
        $gallarys=GallaryImage::get();
        return view('index',compact('welcomes','aboutus','menus','sections','chefs','contactus','gallarys'));
    }
    public function sections(){
        $sections=section::get();
        return view('admin.all_sections',compact('sections'));
    }

    public function menuietms(){
        $menus=Ietm::get();
        $sections=section::get();
        return view('admin.all_menu_ietms',compact('menus','sections'));
    }


}
