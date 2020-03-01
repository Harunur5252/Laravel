<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Alert;
class CategoryController extends Controller
{
    public function categorySave(Request $request)
    {
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->user_id=$request->user_id;
        $category->category_description=$request->category_description;
        $category->publication_status=$request->publication_status;
        $category->save();

        if($category)
        {
            toast('category added Successfully','success');
            return redirect('/home');
        }
        else{
            toast('something went wrong!','error');
            return redirect('/home');
        }

    }
    public function manageCategory()
    {
        $category=Category::all();
        return view('SimpleEcomerce.ViewCategory.view_category',[
            'category'=>$category
        ]);
    }
    public function unpublishedCategory($id)
    {
        $category=Category::find($id);
        $category->publication_status=0;
        $category->save();
        if($category)
        {
            toast('category unpublished Successfully!','success');
            return redirect('/Category/manage');
        }
    }
    public function publishedCategory($id)
    {
        $category=Category::find($id);
        $category->publication_status=1;
        $category->save();
        if($category)
        {
            toast('category published Successfully!','success');
            return redirect('/Category/manage');
        };
    }
    public function editCategory($id)
    {
        $category=Category::find($id);
        return view('SimpleEcomerce.EditCategory.edit_category',[
            'category'=>$category,
        ]);

    }
    public function updateCategory(Request $request)
    {

        $category=Category::find($request->id);
        $category->category_name=$request->category_name;
        $category->category_description=$request->category_description;
        $category->publication_status=$request->publication_status;
        $category->save();
        if($category)
        {
            toast('category updated Successfully!','success');
            return redirect('/Category/manage');
        }


    }
    public function deleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        if($category)
        {
            Alert::success('Success Title', 'Deleted Successfully');
            return redirect('/Category/manage');
        }

    }
}
