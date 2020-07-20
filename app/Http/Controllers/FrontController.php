<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Services;
use App\categories;


class FrontController extends Controller
{
    public function index(){

     $servicios = DB::table('categories')
                  ->join('services', 'categories.id', '=', 'services.categories_id')
                  ->select('services.*','categories.categoria')
                  ->get();
                  
      return view('index',['servicios' => $servicios]);
    }
}
