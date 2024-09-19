<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'loan_date',
        'return_date',
        'actual_return_date',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
