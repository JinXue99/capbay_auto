<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\TestDriveRegistration;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required', 'email' => 'required|email|unique:customers,email',
            'phone' => 'required', 'down_payment' => 'required|numeric|min:0',
            'loan_approved' => 'required|boolean'
        ]);

        $customer = Customer::create($request->only(['name', 'email', 'phone']));
        $customer->registration()->create([
            'down_payment' => $request->down_payment,
            'loan_approved' => $request->loan_approved,
            'test_drive_registration_at' => $request->test_drive_registration_at
        ]);

        return redirect("/customer/{$customer->id}");
    }

    public function customer($id)
    {
        $customer = Customer::with('registration')->findOrFail($id);
        $order = TestDriveRegistration::orderBy('created_at')->pluck('customer_id')->toArray();
        $pos = array_search($customer->id, $order);
        $eligible = $pos !== false && $pos < 10 && $customer->registration->down_payment >= 20000 && $customer->registration->loan_approved && $customer->registration->test_drive_registration_at;
        return view('customer', compact('customer', 'eligible'));
    }

    public function agent()
    {
        $registrations = TestDriveRegistration::with('customer')->orderBy('created_at')->get();
        return view('agent', compact('registrations'));
    }

    public function update(Request $request, $id)
    {
        $reg = TestDriveRegistration::findOrFail($id);
        $reg->update($request->only(['down_payment', 'loan_approved', 'purchased']));
        return back();
    }
}
