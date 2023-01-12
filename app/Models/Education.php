<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'exam',
        'board',
        'year',
        'cgpa',
    ];

    public function applicants()
    {
        return $this->belongsTo(Applicant::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
