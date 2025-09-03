<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
             $student_id = Auth::id();
    $book = Book::findOrFail($id);

    // لو مفيش نسخ متاحة
    if ($book->count <= 0) {
        return redirect()->back()->with('error', 'الكتاب غير متاح حالياً');
    }

    // إنشاء الاستعارة
    BorrowedBook::create([
        'student_id' => $student_id,
        'book_id'    => $id,
        'borrow_date'=> now(),
    ]);

    // قلل عدد النسخ
    $book->decrement('count');

    return redirect()->back()->with('success', 'تم استعارة الكتاب بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
