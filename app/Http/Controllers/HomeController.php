<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Diaries as Diaries;

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
        $diaries = Diaries::where('username', Auth::user()->username)->latest('updated_at')->simplePaginate(10);
        $category = array();

        foreach ($diaries as $diary) {
            array_push($category, Diaries::find($diary->id)->category()->first());
        }

        return view('user.index', ['diaries' => $diaries, 'category' => $category]);
    }

    public function diary()
    {
        $categories = DB::table('categories')->get();

        return view('user.diary', ['categories' => $categories]);
    }

    public function settings()
    {
        $user = DB::table('users')->where('username', Auth::user()->username)->get();
        
        return view('user.settings', ['user' => $user]);
    }
}
