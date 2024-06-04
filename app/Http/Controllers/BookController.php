<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BookController extends Controller
{
    //
    public function add_book(){

        $data= Category::all();
        return view("backend.library.Book.add_book", compact('data'));
    }




    public function Store_book(Request $request)
    {
        // $request->validate([
        //     // 'Book_pdf' => 'required|file|mimes:pdf|max:10240', // 10MB max
        //     'Book_image' => 'required|file|mimes:jpeg,png,jpg,gif|max:1024', // 1MB max
        // ]);

        $validatorIMG = Validator::make($request->all(), [
            'Book_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            // 'Book_pdf' => 'required|file|mimes:pdf|max:10240', // 10MB max for PDF
        ]);

        $validatorPDF = Validator::make($request->all(), [
            // 'Book_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            'Book_pdf' => 'required|file|mimes:pdf|max:10240', // 10MB max for PDF
        ]);

        if ($validatorIMG->fails()) {
            $notification = array(
                'message' => 'Sorry, the size or the file extension doesnt match',
                'alert-type' => 'error'
            );
            return redirect()->route('library.library.add_book')
                ->withErrors($validatorIMG)
                ->withInput()
                ->with($notification);
        }
        if ($validatorPDF->fails()) {
            $notification = array(
                'message' => 'Sorry, the size or the file extension doesnt match',
                'alert-type' => 'error'
            );
            return redirect()->route('library.library.add_book')
                ->withErrors($validatorPDF)
                ->withInput()
                ->with($notification);
        }

        $data = new Book();
        $data->title = $request->title;
        $data->author_name = $request->author_name;
        $data->edition = $request->edition;
        $data->quantity = $request->quantity; // Note: 'quantity' should be camelCase
        $data->category_id = $request->category_id;

        $Book_pdf = $request->file('Book_pdf');
        $Book_image = $request->file('Book_image');

        if ($Book_pdf) {
            $book_pdf_name = time() . '.' . $Book_pdf->getClientOriginalExtension();
            $Book_pdf->move(public_path('books/pdf'), $book_pdf_name);
            $data->BookPDF = $book_pdf_name;
        }else{

            $notification = array(
                'message' => 'Erreur uploading PDF',
                'alert-type' => 'success'

            );
        return redirect()->route('library.library.add_book')->with($notification);

        }

        if ($Book_image) {
            $book_image_name = time() . '.' . $Book_image->getClientOriginalExtension();
            $Book_image->move(public_path('books/images'), $book_image_name);
            $data->Book_image = $book_image_name;
        }
        // dd($data);
        $data->save();

        $notification = array(
            'message' => 'Book saved successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('library.book.view')->with($notification);
    }

    public function View_book(){

        $data = Book::all();

        return view('backend.library.Book.view_book',compact('data'));
    }

    public function Edit_Book($id){


        $data = Book::find($id);
        $categories = Category::all();

        return view('backend.library.Book.edit_book', compact('data',  'categories'));

    }

    public function Update_Book(Request $request , $id){

        $data = Book::find($id);
        $data->title = $request->title;
        $data->author_name = $request->author_name;
        $data->edition = $request->edition;
        $data->quantity = $request->quantity; // Note: 'quantity' should be camelCase
        $data->category_id = $request->category_id;


        $data->save();

        $notification = array(
            'message' => 'Book saved successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('library.book.view')->with($notification);


    }

   public function Delete_Books($id){

    $data = Book::find($id);

    if ($data) {
        $data->delete();
        $notification = array(
            'message' => 'Category Book Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('library.book.view')->with($notification);
    } else {
        $notification = array(
            'message' => "Book doesn't delete",
            'alert-type' => 'info'
        );
    }
   }

}
