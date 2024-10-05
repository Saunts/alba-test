<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use \App\Models\Categories;


class CategoriesController extends Controller
{
    public function getAllCategories() {
        $categories = Categories::all();

        return view('categories/categoriesList', compact('categories'));
    }

    public function newCategoriesForm(){
        return view('categories/newCategories', );
    }

    public function createNewCategories(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        Categories::insert(['category_name'=>$request->name]);

        return redirect()->to('/');
    }

    public function editCategoriesForm($id){
        $categories = Categories::where('id',$id)->first();

        return view('categories/editCategories', compact('categories'));
    }

    public function editCategories($id, Request $request) {
        $categories = Categories::where('id',$id)->first();

        $categories->category_name = $request->name;

        $categories->save();

        return redirect()->to('/categories');
    }

    public function deleteCategories($id) {
        Categories::where('id',$id)->delete();

        return Redirect::back()->with('message','Operation Successful !');
    }
}
