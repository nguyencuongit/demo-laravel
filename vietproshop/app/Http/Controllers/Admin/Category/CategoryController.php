<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Slug\Slug;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::all()->toArray();

        return view("backend/categories/category", ["category"=>$category]);
    }

    public function store(AddCategoryRequest $request){
        $category = new Category();
        $slug = Slug::getSlug($request->name);
        if($request->cat_name == 0){
            $category->name = $request->name;
            $category->slug = $slug;
            $category->parent = 0;
            $category->save();
        }else{
            $category->name = $request->name;
            $category->slug = $slug;
            $category->parent = $request->cat_name;
            $category->save();
        };
        $request->session()->flash("alert", "Đã thêm danh mục thành công!");
        return redirect("/admin/category");
    }
    public function edit(Request $request){
        $category = Category::all()->toArray();
        $id = $request->id;
        $cat_show = Category::find($id)->toArray();
        

        return view("backend/categories/editcategory", ["category"=>$category, "cat_show"=>$cat_show]);
    }
    public function update(EditCategoryRequest $request){
        $slug = Slug::getSlug($request->name);
        $id = $request->id;
        $category = Category::find($id);
        if($request->cat_name == 0){
            $category->name = $request->name;
            $category->slug = $slug;
            $category->parent = 0;
            $category->save();
        }else{
            $category->name = $request->name;
            $category->slug = $slug;
            $category->parent = $request->cat_name;
            $category->save();
        };
        $request->session()->flash("alert", "Đã sửa danh mục thành công!");
        return redirect("/admin/category");
    }
     public function delete(Request $request){
        $id =$request->id;
        $category = Category::find($id);
        $category->delete();
        $request->session()->flash("alert", "Đã xóa danh mục thành công!");
        return redirect("/admin/category");

     }
}
