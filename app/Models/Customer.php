<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'down_payment', 'loan_approved',
        'purchase_status', 'test_drive_registration_at'
    ];

    public function isEligibleForPromo()
    {
        $firstTen = Customer::orderBy('created_at')->take(10)->pluck('id');
        return $firstTen->contains($this->id)
            && $this->down_payment >= 20000
            && $this->loan_approved
            && $this->test_drive_registration_at;
    }

    public function registration()
    {
        return $this->hasOne(TestDriveRegistration::class);
    }
}
