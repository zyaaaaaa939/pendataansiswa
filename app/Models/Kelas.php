<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    public function kelasDetails()
    {
        return $this->hasMany(KelasDetail::class);
    }
}
