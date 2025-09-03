<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $Book=Book::get();
        return view("dashbord.book.view",compact("Book"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashbord.book.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
         if ($request->hasFile("image")) {
            $Image = $request->file("image");
            $data = $request->except("image");



            // حفظ الصور
            $nameImages = Book::saveImage($Image);


            Book::create([
                'title' => $data["title"],
                'author' => $data["author"],
                'description' => $data["description"],
                'count' => $data["count"],
                'image' => $nameImages
            ]);

            return to_route("book.index");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('dashbord.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $book = Book::findOrFail($id);
         return view('dashbord.book.update', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         if($request->hasFile("image")){
            $data=$request->except("image","_token","_method");
            $Image=$request->file("image");
            Book::DeleteImage($id);
           $nameimages=  Book::saveImage($Image);
            $nameimages;
            Book::where("id",$id)->update([
               'title' => $data["title"],
                'author' => $data["author"],
                'description' => $data["description"],
                'count' => $data["count"],
                'image' => $nameimages
            ]);
            return to_route("book.index");
        }
        else{
            $data=$request->except("image","_token","_method");
            Book::where("id",$id)->update($data);
            return to_route("book.index");

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::DeleteImage($id);
        Book::where("id",$id)->delete();
        return to_route("book.index");
    }
}
