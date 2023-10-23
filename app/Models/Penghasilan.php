<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghasilan extends Model
{
    use HasFactory;
    protected $table = 'penghasilan';
    protected $guarded = ['id'];
    
    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }
}
