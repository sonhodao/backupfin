<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $data = [];

        $data["countUser"] = User::count();
        $data["countPost"]    = Post::count();
        $data["latestOrders"]  = null;
        $data["recentlyAddedPosts"]  = Post::orderBy('id', 'DESC')->take(8)->get();

        return view('home.index', $data);
    }
}
