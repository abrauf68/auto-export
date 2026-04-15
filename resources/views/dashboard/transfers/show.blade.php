@extends('layouts.master')

@section('title', __('Transfer Details'))

@section('css')
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.transfers.index') }}">{{ __('Transfers') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Transfer Details') }}</li>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">{{ __('Transfer Details') }}</h4>

                <a href="{{ route('dashboard.transfers.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body">

                <!-- BASIC INFO -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <strong>Type:</strong>
                        <span class="badge bg-label-primary">{{ ucfirst($transfer->type) }}</span>
                    </div>

                    <div class="col-md-3">
                        <strong>Vehicle:</strong><br>
                        {{ $transfer->vehicle->vehicle_name ?? '-' }}
                        <small class="text-muted d-block">
                            {{ $transfer->vehicle->reg_no ?? '' }}
                        </small>
                    </div>

                    <div class="col-md-3">
                        <strong>Date:</strong><br>
                        {{ \Carbon\Carbon::parse($transfer->transfer_date)->format('d M Y') }}
                    </div>

                    <div class="col-md-3">
                        <strong>Created At:</strong><br>
                        {{ $transfer->created_at->format('d M Y H:i') }}
                    </div>
                </div>

                <hr>

                <!-- FROM & TO USERS -->
                <div class="row">

                    <!-- FROM USER -->
                    <div class="col-md-6">
                        <div class="card border">
                            <div class="card-header bg-label-info">
                                <strong>From User</strong>
                            </div>
                            <div class="card-body mt-3">

                                <p><strong>Name:</strong> {{ $transfer->fromUser->name ?? '-' }}</p>
                                <p><strong>Father Name:</strong> {{ $transfer->fromUser->father_name ?? '-' }}</p>
                                <p><strong>Email:</strong> {{ $transfer->fromUser->email ?? '-' }}</p>
                                <p><strong>Phone:</strong> {{ $transfer->fromUser->phone ?? '-' }}</p>
                                <p><strong>CNIC:</strong> {{ $transfer->fromUser->cnic ?? '-' }}</p>
                                <p><strong>Company:</strong> {{ $transfer->fromUser->company ?? '-' }}</p>
                                <p><strong>Country:</strong> {{ $transfer->fromUser->country ?? '-' }}</p>
                                <p><strong>Address:</strong> {{ $transfer->fromUser->address ?? '-' }}</p>

                            </div>
                        </div>
                    </div>

                    <!-- TO USER -->
                    <div class="col-md-6">
                        <div class="card border">
                            <div class="card-header bg-label-success">
                                <strong>To User</strong>
                            </div>
                            <div class="card-body mt-3">

                                <p><strong>Name:</strong> {{ $transfer->toUser->name ?? '-' }}</p>
                                <p><strong>Father Name:</strong> {{ $transfer->toUser->father_name ?? '-' }}</p>
                                <p><strong>Email:</strong> {{ $transfer->toUser->email ?? '-' }}</p>
                                <p><strong>Phone:</strong> {{ $transfer->toUser->phone ?? '-' }}</p>
                                <p><strong>CNIC:</strong> {{ $transfer->toUser->cnic ?? '-' }}</p>
                                <p><strong>Company:</strong> {{ $transfer->toUser->company ?? '-' }}</p>
                                <p><strong>Country:</strong> {{ $transfer->toUser->country ?? '-' }}</p>
                                <p><strong>Address:</strong> {{ $transfer->toUser->address ?? '-' }}</p>

                            </div>
                        </div>
                    </div>

                </div>

                <hr>

                <!-- NOTES -->
                <div class="row">
                    <div class="col-md-12">
                        <strong>Notes:</strong>
                        <div class="p-3 border rounded bg-light mt-2">
                            {{ $transfer->notes ?? 'No notes available' }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('script')

@endsection
