<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_id',
        'name',
        'detail',
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
