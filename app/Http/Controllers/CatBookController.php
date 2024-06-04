<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CatBookController extends Controller
{
    //
    public function CategotyView(){

        $data = Category::all();
        return view('backend.library.Catbook_view' , compact('data'));
    }
    public function AddCatBook(Request $request)
    {

        $data = new Category();

        $data->cat_title = $request->category;

        $data->save();

        $notification = array(
            'message' => 'Category Save Successful',
            'alert-type' => 'success'
        );
	    	return redirect()->route('library.library.view')->with($notification);

        // return redirect()->back();
    }

    public function Delet_Cat($id)
    {
        $data = Category::find($id);

        if ($data) {
            $data->delete();
            $notification = array(
                'message' => 'Category Book Deleted Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('library.library.view')->with($notification);
        } else {
            return redirect()->route('library.library.view')->with('error', 'Category not found');
        }
    }

    public function Edit_Category($id){

        $data = Category::find($id);


        return view('backend.library.Edit_Category', compact('data'));

    }

    public function update_category(Request $request , $id){

        $data = Category::find($id);

        $data->cat_title = $request->category;

        $data->save();

        $notification = array(
            'message' => 'Category Book Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('library.library.view')->with($notification);

    }

}
