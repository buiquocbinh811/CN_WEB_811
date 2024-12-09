<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import model Post
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tất cả bài viết từ cơ sở dữ liệu
        $posts = Post::all();
        
        // Trả về view và truyền dữ liệu vào view
        return view('home', compact('posts'));
    }
}
