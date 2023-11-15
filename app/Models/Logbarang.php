<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbarang extends Model
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
        'approval_by',
        'so',
        'valuation_type',
        'tanggal',
        'lokasi_asal',
        'customer_name',
        'merk',
        'type',
        'sn',
        'is_continue',
        'dead_on_arrival',
        'dead_on_operational',
        'ber',
        'software_error',
        'tributary_error',
        'channel_error',
        'port_error',
        'tx_laser_faulty',
        'rx_laser_faulty',
        'physical_damage',
        'miscelaneous',
        'intermittent',
        'rectifier',
        'charging',
        'battery_faulty',
        'number_of_tribu',
        'number_of_channel',
        'number_of_port','signature'
    ];
    
}
