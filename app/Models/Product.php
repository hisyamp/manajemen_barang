<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'log_barang';
    protected $guard = [];
    protected $timestamp = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'barang',
        'notes',
        'jumlah',
        'satuan',
        'tanggal_pengembalian',
        'status',
        'status_approval',
        'notes_approval',
        'tanggal_approval',
        'approval_by'
    ];
    
}
