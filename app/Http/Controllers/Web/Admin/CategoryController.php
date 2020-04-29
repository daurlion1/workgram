<?php

namespace App\Http\Controllers\Web\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\WebBaseController;
use App\Http\Requests\Web\CategoryStoreAndUpdateRequest;



class CategoryController extends WebBaseController
{

    public function index() {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        $category = new Category();
        if(!empty($category)) $category = null;
        return view('admin.category.create', compact('category'));

    }

    public function store(CategoryStoreAndUpdateRequest $request) {


        Category::create([
            'name' => $request->name,
        ]);
        $this->added();
        return redirect()->route('category.index');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));

    }

    public function update($id, CategoryStoreAndUpdateRequest $request)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);
        $this->edited();
        return redirect()->route('category.index');
    }


}
