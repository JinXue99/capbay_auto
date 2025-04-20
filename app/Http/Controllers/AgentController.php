<?php
namespace App\Http\Controllers;

use App\Models\TestDriveRegistration;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    // List all test drive registrations
    public function index()
    {
        $registrations = TestDriveRegistration::with('customer')->orderBy('created_at')->get();
        return response()->json($registrations);
    }

    // Update a test drive registration (e.g. down payment, loan, purchase status)
    public function update(Request $request, $id)
    {
        $registration = TestDriveRegistration::findOrFail($id);

        $request->validate([
            'down_payment' => 'sometimes|numeric|min:0',
            'loan_approved' => 'sometimes|boolean',
            'purchased' => 'sometimes|boolean',
        ]);

        $registration->update($request->only(['down_payment', 'loan_approved', 'purchased']));

        return response()->json(['message' => 'Registration updated successfully.']);
    }
}
?>
