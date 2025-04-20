@extends('layout')

@section('content')
<h4>Test Drive Registrations</h4>
@foreach ($registrations as $reg)
    <div class="card my-3 p-3">
        <h5>{{ $reg->customer->name }}</h5>
        <p>Queue Sequence: {{ $reg->customer->id }}</p>
        <p>Email: {{ $reg->customer->email }}</p>
        <p>Down Payment: RM {{ number_format($reg->down_payment, 2) }}</p>
        <p>Loan Approved: {{ $reg->loan_approved ? 'Yes' : 'No' }}</p>
        <p>Purchased: {{ $reg->purchased ? 'Yes' : 'No' }}</p>
        <p>Test Drive Date: {{ $reg->test_drive_registration_at ? \Carbon\Carbon::parse($reg->test_drive_registration_at)->format('d-m-Y') : 'No' }}</p>
        <p>
            @php
                $firstTenIds = \App\Models\TestDriveRegistration::orderBy('created_at')
                    ->limit(10)
                    ->pluck('customer_id')
                    ->toArray();

                $eligible = in_array($reg->customer_id, $firstTenIds) &&
                    $reg->down_payment >= 20000 &&
                    $reg->loan_approved &&
                    $reg->test_drive_registration_at;
            @endphp
            Promotion Eligibility:
            <span class="text-{{ $eligible ? 'success' : 'danger' }}">
                {{ $eligible ? '✅ Eligible' : '❌ Not Eligible' }}
            </span>
        </p>

        <form method="POST" action="/agent/update/{{ $reg->id }}">
            @csrf
            <div class="row">
                <div class="col"><input type="number" name="down_payment" placeholder="Down Payment" class="form-control"></div>
                <div class="col">
                    <select name="loan_approved" class="form-select">
                        <option value="">Loan?</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col">
                    <select name="purchased" class="form-select">
                        <option value="">Purchased?</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col"><button class="btn btn-sm btn-secondary">Update</button></div>
            </div>
        </form>
    </div>
@endforeach
@endsection
