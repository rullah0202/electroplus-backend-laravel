<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;

class CategoryController extends Controller
{
    public function AllCategory(){
        $categories = category::latest()->get();
        return view('backend.category.category_all',compact('categories'));
    }//End Method

    public function AddCategory(){
        return view('backend.category.category_add');
    }//End Method

    public function StoreCategory(Request $request){

        // Validate
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        if(!$request->file('category_image')){
            $notification = array(
                'message' => 'Must select an Image',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification); 
        }
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;
        category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_slug)), 
            'category_image' => $save_url
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification); 

    }//End Method

    public function EditCategory($id){
        $category = category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }//End Method

    public function UpdateCategory(Request $request){

        $category_id = $request->id;
        $old_img = $request->old_image;

        // Validate
        $request->validate([
            Rule::unique('categories')->ignore($category_id)
        ]);

        if ($request->file('category_image')) {

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;

        if (file_exists($old_img)) {
           unlink($old_img);
        }

        category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'category_image' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Category Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification); 

        } else {

             Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)), 
        ]);

       $notification = array(
            'message' => 'Category Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification); 

        } // end else

    }// End Method 
    public function DeleteCategory($id){

        $category = Category::findOrFail($id);
        $img = $category->category_image;
        unlink($img ); 

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 
}
