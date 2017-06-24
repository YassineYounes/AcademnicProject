<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use App\Post;
use App\Specialty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects= Post::all();
        $isiad = Post::where('secialty','=','1')->count();
        $isem = Post::where('secialty','=','2')->count();
        $irsa = Post::where('secialty','=','3')->count();
        $commun = Post::where('secialty','=','4')->count();
        $count=array('ISIAD' => $isiad,
                     'ISEM' => $isem,
                     'IRSA' => $irsa,
                     'commun' => $commun
            );
        $specialties= Specialty::all();
        return view('home',compact('subjects','count','specialties'));
    }
}
