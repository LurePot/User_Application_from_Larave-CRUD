<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'user_id',
        'division_id',
        'district_id',
        'upozila_id',
        'address',
        'language',
        'photo',
        'cv',
        'exam',
        'board',
        'year',
        'cgpa',
        'tname',
        'tdetail',
        


    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function upozila()
    {
        return $this->belongsTo(Upozila::class);
    }
    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
