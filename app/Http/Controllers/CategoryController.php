<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('id','asc')->paginate(5);

    	 return View::make('categories.index',compact('categories'));
    }

    public function create()
    {

		return View::make('categories.create');
    }

    public function store(Category $category,CategoryRequest $request)
    {

		$category->create($request->all());

		 return redirect()->route('categories.index')->with('message', 'Registro guardado correctamente.');
    }

    public function edit(Category $category)
    {

		return View::make('categories.edit',compact('category'));
    }

    public function update(Category $category,Request $request)
    {

		$category->update($request->all());

		 return redirect()->route('categories.index')->with('message', 'Registro actualizado correctamente.');
    }

    public function destroy(Category $category)
    {


        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Registro eliminado correctamente.');

    }
}
