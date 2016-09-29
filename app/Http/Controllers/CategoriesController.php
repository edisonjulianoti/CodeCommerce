<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;

class CategoriesController extends Controller
{
    private $categories;

    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }

    public function index()
    {
        $categories = $this->categories->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Requests\CategoriesRequest $request)
    {
        $input = $request->all();
        $category = $this->categories->fill($input);
        $category->save();

        return redirect()->route('categories');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = $this->categories->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Requests\CategoriesRequest $request, $id)
    {
        $this->categories->find($id)->update($request->all());

        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        $this->categories->find($id)->delete();
        return redirect()->route('categories');
    }
}
