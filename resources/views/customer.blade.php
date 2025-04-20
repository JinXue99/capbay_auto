@extends('layout')

@section('content')
<h4>Customer: {{ $customer->name }}</h4>
<p>Email: {{ $customer->email }}</p>
<p>Phone: {{ $customer->phone }}</p>
<p>Down Payment: RM {{ number_format($customer->registration->down_payment, 2) }}</p>
<p>Loan Approved: {{ $customer->registration->loan_approved ? 'Yes' : 'No' }}</p>
<p>Test Drive Date: {{ $customer->registration->test_drive_registration_at ? 'Yes' : 'No' }}</p>

<h5 class="mt-3">
    Promotion Eligibility:
    <span class="text-{{ $eligible ? 'success' : 'danger' }}">
        {{ $eligible ? '✅ Eligible' : '❌ Not Eligible' }}
    </span>
</h5>
@endsection
