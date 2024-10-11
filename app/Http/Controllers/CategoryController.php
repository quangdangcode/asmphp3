<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CategoryController extends Controller
{

    const PATH_VIEW = 'admin.';
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $cateCount = Category::count();
        $postCount = Post::count();
        $userCount = User::count();
        $commentCount = Comment::count();
        return view(self::PATH_VIEW . 'dashboard', compact('cateCount', 'postCount', 'userCount', 'commentCount'));
    }

    public function index()
    {
        $categories = Category::all();
        return view(self::PATH_VIEW . 'categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . 'categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];
        Category::query()->create($data);
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view(self::PATH_VIEW . 'categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = [
            'name' => $request->name,
        ];
        $category->update($data);
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
