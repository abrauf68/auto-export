@extends('layouts.master')

@section('title', __('Create Payment'))

@section('css')
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.payments.index') }}">{{ __('Payments') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-6">
            <!-- Account -->
            <div class="card-body pt-4">
                <form method="POST" action="{{ route('dashboard.payments.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row p-5">
                        <h3>{{ __('Add New Payment') }}</h3>
                        <div class="mb-4 col-md-12">
                            <label for="billing_id" class="form-label">{{ __('Billing') }}</label><span
                                class="text-danger">*</span>
                            <select name="billing_id" class="form-select select2 @error('billing_id') is-invalid @enderror"
                                id="billing_id" required>
                                <option value="" selected disabled>Select Billing</option>
                                @foreach ($billings as $bill)
                                    <option value="{{ $bill->id }}" data-remaining="{{ $bill->remaining_amount }}">
                                        {{ $bill->bill_no }}</option>
                                @endforeach
                            </select>
                            @error('billing_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-6">
                            <label class="form-label">Remaining Amount</label>
                            <input type="text" id="remaining_amount" class="form-control" readonly>
                        </div>

                        <div class="mb-4 col-md-6">
                            <label class="form-label">Amount</label><span class="text-danger">*</span>
                            <input type="number" step="0.01" name="amount" id="amount"
                                class="form-control @error('amount') is-invalid @enderror" required>

                            @error('amount')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 col-md-6">
                            <label class="form-label">Payment Date</label><span class="text-danger">*</span>
                            <input type="date" name="payment_date"
                                class="form-control @error('payment_date') is-invalid @enderror"
                                value="{{ old('payment_date', date('Y-m-d')) }}" required>

                            @error('payment_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 col-md-6">
                            <label class="form-label">Payment Method</label><span class="text-danger">*</span>
                            <select name="payment_method"
                                class="form-select @error('payment_method') is-invalid @enderror" required>
                                <option value="">Select Method</option>
                                <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="bank" {{ old('payment_method') == 'bank' ? 'selected' : '' }}>Bank Transfer</option>
                                <option value="jazzcash" {{ old('payment_method') == 'jazzcash' ? 'selected' : '' }}>JazzCash</option>
                                <option value="easypaisa" {{ old('payment_method') == 'easypaisa' ? 'selected' : '' }}>EasyPaisa</option>
                            </select>

                            @error('payment_method')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-3">{{ __('Add Payment') }}</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#billing_id').on('change', function() {
                let remaining = $(this).find(':selected').data('remaining');

                $('#remaining_amount').val(remaining);
                $('#amount').val(remaining);
            });

        });
    </script>
@endsection
