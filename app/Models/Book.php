<?php

namespace App\Models;

use App\Models\BorrowedBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'image',
        'count',
    ];

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }

    // حالة الكتاب محسوبة (available / borrowed)
    public function getStatusAttribute()
    {
        return $this->count > 0 ? 'Available' : 'Borrowed';
    }

    public static function saveImage($image)
    {

     $path = $image->store('images', 'public');
      return $path;
    }

   public static function DeleteImage($id)
{
    $file = Book::where("id", $id)->pluck("image")->first();

    if ($file) {
        $path = storage_path("app/public/" . $file);

        if (file_exists($path)) {
            unlink($path);
        }
    }
}


}
