<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestDriveRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'down_payment', 'loan_approved', 'test_drive_registration_at', 'purchased'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
?>