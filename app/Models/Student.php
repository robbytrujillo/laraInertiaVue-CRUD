<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'jurusan', 'kelas', 'nim'];

    public function scopeFilter($query, $params) {
        if ($params->q) {
            $query->where(function ($query) use ($params) {
                $query->where('name', 'like', '%' . $params->q . '%')
                ->orWhere('jurusan', 'LIKE', '%' . $params->q . '%')
                ->orWhere('nim', 'LIKE', '%' .$params->q . '%');
            });
    }
}
}