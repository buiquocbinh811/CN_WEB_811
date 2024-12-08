<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả các bài viết từ cơ sở dữ liệu
        $posts = Post::all();


        // Trả về view với danh sách các bài viết
        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Trả về view tạo bài viết mới
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Tạo mới một bài viết
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Quay lại trang danh sách bài viết với thông báo thành công
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tìm bài viết theo ID
        $post = Post::findOrFail($id);

        // Trả về view hiển thị chi tiết bài viết
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tìm bài viết theo ID
        $post = Post::findOrFail($id);

        // Trả về view chỉnh sửa bài viết
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Tìm bài viết theo ID và cập nhật
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Quay lại trang danh sách bài viết với thông báo thành công
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm bài viết theo ID và xóa
        $post = Post::findOrFail($id);
        $post->delete();

        // Quay lại trang danh sách bài viết với thông báo thành công
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
