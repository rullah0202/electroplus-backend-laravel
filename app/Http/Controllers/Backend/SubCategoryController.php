<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{

        public function AllSubCategory(){
           $subcategories = SubCategory::latest()->get();
           return view('backend.subcategory.subcategory_all',compact('subcategories'));
       } // End Method 
   
    
       public function AddSubCategory(){
   
         $categories = Category::orderBy('category_name','ASC')->get();
         return view('backend.subcategory.subcategory_add',compact('categories'));
   
       }// End Method 
   
   
       public function StoreSubCategory(Request $request){ 
           
        // Validate
           $request->validate([
            'subcategory_name' => 'required|unique:sub_categories'
            ]);

           SubCategory::insert([
               'category_id' => $request->category_id,
               'subcategory_name' => $request->subcategory_name,
               'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)), 
           ]);
   
          $notification = array(
               'message' => 'SubCategory Inserted Successfully',
               'alert-type' => 'success'
           );
   
           return redirect()->route('all.subcategory')->with($notification); 
   
       }// End Method 
   
   
       public function EditSubCategory($id){
   
         $categories = Category::orderBy('category_name','ASC')->get();
         $subcategory = SubCategory::findOrFail($id);
         return view('backend.subcategory.subcategory_edit',compact('categories','subcategory'));
   
       }// End Method 
   
   
   
       public function UpdateSubCategory(Request $request,$id){
   
            // Validate
            $request->validate([
                Rule::unique('sub_categories')->ignore($id)
            ]);

            //    $subcat_id = $request->id;
            SubCategory::findOrFail($id)->update([
               'category_id' => $request->category_id,
               'subcategory_name' => $request->subcategory_name,
               'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)), 
           ]);
   
            $notification = array(
                'message' => 'SubCategory Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.subcategory')->with($notification); 
   
   
       }// End Method 
   
   
       public function DeleteSubCategory($id){
   
           SubCategory::findOrFail($id)->delete();
   
            $notification = array(
               'message' => 'SubCategory Deleted Successfully',
               'alert-type' => 'success'
           );
   
           return redirect()->back()->with($notification); 
   
   
       }// End Method 
   
   
       public function GetSubCategory($category_id){
           $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
               return json_encode($subcat);
   
       }// End Method 
   
}
