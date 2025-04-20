<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\TestDriveRegistration;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Register a new customer + their test drive registration
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required',
            'down_payment' => 'required|numeric|min:0',
            'loan_approved' => 'required|boolean',
        ]);

        $customer = Customer::create($request->only(['name', 'email', 'phone']));

        $customer->registration()->create([
            'down_payment' => $request->down_payment,
            'loan_approved' => $request->loan_approved,
            'purchased' => $request->purchased,
            'test_drive_regstration_date' => $request->test_drive_registration_at,
        ]);

        return response()->json(['message' => 'Customer registered successfully.'], 201);
    }

    // View customer + check promotion eligibility
    public function show($id)
    {
        $customer = Customer::with('registration')->findOrFail($id);

        $isEligible = false;
        $registrationOrder = TestDriveRegistration::orderBy('created_at')->pluck('customer_id')->toArray();
        $position = array_search($customer->id, $registrationOrder);

        if (
            $position !== false && $position < 10 &&
            $customer->registration->down_payment >= 20000 &&
            $customer->registration->loan_approved &&
            $customer->registration->test_drive_resgistration_at 
        ) {
            $isEligible = true;
        }

        return response()->json([
            'customer' => $customer,
            'eligible_for_promotion' => $isEligible,
        ]);
    }
}
?>
