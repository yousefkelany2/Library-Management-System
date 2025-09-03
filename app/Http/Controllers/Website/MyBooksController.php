<?php

namespace App\Http\Controllers\Website;

use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         if(!Auth::check()){
             return redirect()->route("Login.index") ;
          }
          $studentId = Auth::id();

    $borrowedBooks = BorrowedBook::where('student_id', $studentId)
        ->with('book')
        ->get();

    return view('website.MyBooks', compact('borrowedBooks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
public function show(string $id)
{
    if (!Auth::check()) {
        return redirect()->route("Login.index");
    }

    $student_id = Auth::id();
    $book = Book::findOrFail($id);


    if ($book->count <= 0) {
        return redirect()->back()->with('error', 'Book Not Available Now');
    }


    $alreadyBorrowed = BorrowedBook::where('student_id', $student_id)
                        ->where('book_id', $id)
                        ->whereNull('return_date') // لسه مرجعهوش
                        ->exists();

    if ($alreadyBorrowed) {
        return redirect()->back()->with('error', 'You already borrowed this book!');
    }


    BorrowedBook::create([
        'student_id' => $student_id,
        'book_id'    => $id,
        'borrow_date'=> now(),
    ]);

    $book->decrement('count');

    return redirect()->route('MyBooks.index')
                    ->with('success', 'You Borrowed The Book Done!');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          if (!Auth::check()) {
        return redirect()->route("Login.index");
            }

            $student_id = Auth::id();

            $borrow = BorrowedBook::where('student_id', $student_id)
                                ->where('book_id', $id)
                                ->whereNull('return_date')
                                ->first();

            if (!$borrow) {
                return redirect()->back()->with('error', 'You did not borrow this book.');
            }


            $borrow->update([
                'return_date' => now(),
            ]);


            $book = Book::findOrFail($id);
            $book->increment('count');

            return redirect()->route('MyBooks.index')->with('success', 'You Returned The Book Successfully!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         if (!Auth::check()) {
        return redirect()->route("Login.index");
    }

    $student_id = Auth::id();

    $borrow = BorrowedBook::where('id', $id)
                          ->where('student_id', $student_id)
                          ->whereNotNull('return_date') 
                          ->first();

    if (!$borrow) {
        return redirect()->back()->with('error', 'You can only delete returned books.');
    }

    $borrow->delete();

    return redirect()->route('MyBooks.index')->with('success', 'Book record deleted successfully!');

    }
}
