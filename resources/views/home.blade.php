@extends('layout')

@php
    $minDate = \Carbon\Carbon::now()->format('Y-m-d');
    $maxDate = \Carbon\Carbon::now()->addDays(14)->format('Y-m-d');

@endphp

@section('content')
<form method="POST" action="/register">
    @csrf
    <div class="mb-3"><input name="name" class="form-control" placeholder="Name" required></div>
    <div class="mb-3"><input name="email" type="email" class="form-control" placeholder="Email" required></div>
    <div class="mb-3"><input name="phone" class="form-control" placeholder="Phone" required></div>
    <div class="mb-3"><input name="down_payment" type="number" class="form-control" placeholder="Down Payment" required></div>
    <div class="mb-3">
        <select name="loan_approved" class="form-select" required>
            <option value="">Loan Approved?</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>
    <div class="mb-3">
        <select name="purchased" class="form-select" required>
            <option value="">Purchased?</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>

    <div class="mb-3">
        <p><b>Test Drive Registration Date: </p>
        <input name="test_drive_registration_at" class="form-control" type="date" min="{{ $minDate }}" max="{{ $maxDate }}" >
    </div>
    <button class="btn btn-primary">Register</button>
</form>
@endsection
