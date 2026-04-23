@extends('layouts.master')
@section('title', 'Case Details #' . $case->case_no)

@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.cases.index') }}">Cases</a></li>
    <li class="breadcrumb-item active">Case #{{ $case->case_no }}</li>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header bg-label-primary d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 text-primary">
                    <i class="ti ti-file-info me-2"></i>
                    Case Details #{{ $case->case_no }}
                </h5>
                <small class="text-muted">{{ $case->vehicle_reg_no }} • {{ $case->submitted_by }}</small>
            </div>
            <a href="{{ route('dashboard.cases.index') }}" class="btn btn-label-secondary btn-sm">
                <i class="ti ti-arrow-left me-1"></i> Back to List
            </a>
        </div>

        <div class="card-body m-3">

            {{-- Basic Information --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h6 class="text-primary border-bottom pb-2 mb-3">
                        <i class="ti ti-user me-2"></i> Basic Information
                    </h6>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="fw-medium text-muted">Vehicle Reg. No.</label>
                    <p class="mb-0 fw-semibold">{{ $case->vehicle_reg_no }}</p>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="fw-medium text-muted">Make & Year</label>
                    <p class="mb-0 fw-semibold">
                        {{ $case->make ?? 'N/A' }}
                        @if($case->year) ({{ $case->year }}) @endif
                    </p>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="fw-medium text-muted">Submitted By</label>
                    <p class="mb-0 fw-semibold">{{ $case->submitted_by }}</p>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="fw-medium text-muted">Mobile No.</label>
                    <p class="mb-0 fw-semibold">{{ $case->mobile_no }}</p>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="fw-medium text-muted">Submission Date</label>
                    <p class="mb-0 fw-semibold">{{ \Carbon\Carbon::parse($case->submission_date)->format('d M, Y') }}</p>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="fw-medium text-muted">Tentative Return Date</label>
                    <p class="mb-0 fw-semibold">
                        {{ $case->tentative_return_date ? \Carbon\Carbon::parse($case->tentative_return_date)->format('d M, Y') : 'N/A' }}
                    </p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-medium text-muted">Case Referred To</label>
                    <p class="mb-0 fw-semibold">{{ $case->case_refer_to }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-medium text-muted">Work Type</label>
                    <span class="badge bg-label-primary fs-6">{{ ucfirst($case->work_type) }}</span>
                </div>
            </div>

            {{-- Work Details Section --}}
            <h6 class="text-primary border-bottom pb-2 mb-4">
                <i class="ti ti-list-details me-2"></i> Work Details
            </h6>

            <div class="row g-4">

                {{-- Transfer Details --}}
                @if($case->transfer)
                <div class="col-12">
                    <div class="card border-primary shadow-sm">
                        <div class="card-header bg-label-primary">
                            <strong>Transfer Details</strong>
                        </div>
                        <div class="card-body mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-dark">From</h6>
                                    <p><strong>Name:</strong> {{ $case->transfer->from_name }}</p>
                                    <p><strong>S/O:</strong> {{ $case->transfer->from_s_o ?? 'N/A' }}</p>
                                    <p><strong>NIC:</strong> {{ $case->transfer->from_nic }}</p>
                                    <p><strong>Biometric:</strong>
                                        <span class="badge {{ $case->transfer->from_biometric ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $case->transfer->from_biometric ? 'Yes' : 'No' }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-dark">To</h6>
                                    <p><strong>Name:</strong> {{ $case->transfer->to_name }}</p>
                                    <p><strong>S/O:</strong> {{ $case->transfer->to_s_o ?? 'N/A' }}</p>
                                    <p><strong>NIC:</strong> {{ $case->transfer->to_nic }}</p>
                                    <p><strong>Biometric:</strong>
                                        <span class="badge {{ $case->transfer->to_biometric ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $case->transfer->to_biometric ? 'Yes' : 'No' }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3"><strong>Engine No:</strong> {{ $case->transfer->engine_no ?? 'N/A' }}</div>
                                <div class="col-md-3"><strong>Chassis No:</strong> {{ $case->transfer->chassis_no ?? 'N/A' }}</div>
                                <div class="col-md-2"><strong>Wheels:</strong> {{ $case->transfer->wheels ?? 'N/A' }}</div>
                                <div class="col-md-2"><strong>Weight:</strong> {{ $case->transfer->weight ?? 'N/A' }}</div>
                                <div class="col-md-2"><strong>Last Tax:</strong> {{ $case->transfer->last_tax ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Alteration Details --}}
                @if($case->alteration)
                <div class="col-12">
                    <div class="card border-primary shadow-sm">
                        <div class="card-header bg-label-primary">
                            <strong>Alteration Details</strong>
                        </div>
                        <div class="card-body mt-3">
                            <div class="row g-3">
                                <div class="col-md-3"><strong>Engine No:</strong> {{ $case->alteration->engine_no }}</div>
                                <div class="col-md-3"><strong>Chassis No:</strong> {{ $case->alteration->chassis_no }}</div>
                                <div class="col-md-3"><strong>Wheels:</strong> {{ $case->alteration->wheels ?? 'N/A' }}</div>
                                <div class="col-md-3"><strong>Weight:</strong> {{ $case->alteration->weight ?? 'N/A' }}</div>
                            </div>
                            <hr>
                            <h6 class="text-dark">Alteration Changes</h6>
                            <div class="row g-3">
                                <div class="col-md-6"><strong>Wheel:</strong> {{ $case->alteration->alt_from ?? 'N/A' }} → {{ $case->alteration->alt_to ?? 'N/A' }}</div>
                                <div class="col-md-6"><strong>Engine:</strong> {{ $case->alteration->alt_engine ?? 'N/A' }}</div>
                                <div class="col-md-6"><strong>Body:</strong> {{ $case->alteration->alt_body ?? 'N/A' }}</div>
                                <div class="col-12"><strong>Documents:</strong> {{ $case->alteration->alt_docs ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Tax Details --}}
                @if($case->tax)
                <div class="col-md-6">
                    <div class="card border-primary shadow-sm h-100">
                        <div class="card-header bg-label-primary">
                            <strong>Tax Details</strong>
                        </div>
                        <div class="card-body mt-3">
                            <p><strong>From:</strong> {{ $case->tax->tax_from }}</p>
                            <p><strong>To:</strong> {{ $case->tax->tax_to }}</p>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Insurance Details --}}
                @if($case->insurance)
                <div class="col-12">
                    <div class="card border-primary shadow-sm">
                        <div class="card-header bg-label-primary">
                            <strong>Insurance Details</strong>
                        </div>
                        <div class="card-body mt-3">
                            <p class="text-muted">{{ $case->insurance->details }}</p>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Permit Details --}}
                @if($case->permit)
                <div class="col-md-6">
                    <div class="card border-primary shadow-sm h-100">
                        <div class="card-header bg-label-primary">
                            <strong>Permit Details</strong>
                        </div>
                        <div class="card-body mt-3">
                            <p><strong>Region:</strong> {{ $case->permit->region }}</p>
                            <p><strong>Documents:</strong> {{ $case->permit->docs ?? 'N/A' }}</p>
                            <p><strong>Expiration Date:</strong> {{ $case->permit->expiry_date ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Fitness Details --}}
                @if($case->fitness)
                <div class="col-md-6">
                    <div class="card border-primary shadow-sm h-100">
                        <div class="card-header bg-label-primary">
                            <strong>Fitness Details</strong>
                        </div>
                        <div class="card-body mt-3">
                            <p><strong>From:</strong> {{ $case->fitness->fitness_from }}</p>
                            <p><strong>Documents:</strong> {{ $case->fitness->docs ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                @endif

                {{-- If no work details added yet --}}
                @if(!$case->transfer && !$case->alteration && !$case->tax && !$case->insurance && !$case->permit && !$case->fitness)
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <i class="ti ti-info-circle me-2"></i>
                            No additional work details have been added yet for this case.
                        </div>
                    </div>
                @endif

            </div>
        </div>

        {{-- Footer Actions --}}
        <div class="card-footer text-end">
            <a href="{{ route('dashboard.cases.next-steps', $case->id) }}"
               class="btn btn-primary">
                <i class="ti ti-plus me-2"></i> Add More Work Details
            </a>
        </div>
    </div>
</div>
@endsection
