<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BorrowedBook extends Model
{

     use HasFactory;


    protected $fillable = [
        'student_id',
        'book_id',
        'borrow_date',
        'return_date',
    ];

    // العلاقة: الاستعارة تخص طالب
    public function student()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة: الاستعارة تخص كتاب
    public function book()
    {
        return $this->belongsTo(Book::class,"book_id");
    }
}
