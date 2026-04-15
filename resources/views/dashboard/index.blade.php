@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="row g-6">

    <!-- ================= SUMMARY CARDS ================= -->
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Total Transfers</h6>
                        <h3>128</h3>
                    </div>
                    <i class="ti ti-arrows-exchange fs-1 text-primary"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Total Alterations</h6>
                        <h3>64</h3>
                    </div>
                    <i class="ti ti-edit fs-1 text-warning"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Total Permits</h6>
                        <h3>92</h3>
                    </div>
                    <i class="ti ti-license fs-1 text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Active Vehicles</h6>
                        <h3>215</h3>
                    </div>
                    <i class="ti ti-car fs-1 text-danger"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= CHARTS ================= -->
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between">
                <h5>Transfers Overview</h5>
                <div>
                    <button class="btn btn-sm btn-primary">Export PDF</button>
                    <button class="btn btn-sm btn-success">Export Excel</button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="transferChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5>Permits Status</h5>
            </div>
            <div class="card-body">
                <canvas id="permitChart"></canvas>
            </div>
        </div>
    </div>

    <!-- ================= RECENT TABLE ================= -->
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5>Recent Transfers</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vehicle</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Corolla 2020</td>
                            <td>Ali Khan</td>
                            <td>Ahmed Raza</td>
                            <td>12 Apr 2026</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Honda Civic</td>
                            <td>Usman</td>
                            <td>Bilal</td>
                            <td>10 Apr 2026</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // ================= TRANSFER LINE CHART =================
    const ctx1 = document.getElementById('transferChart');

    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Transfers',
                data: [10, 25, 18, 30, 22, 40],
                borderWidth: 2,
            }]
        }
    });

    // ================= PERMIT PIE CHART =================
    const ctx2 = document.getElementById('permitChart');

    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Active', 'Expired', 'Cancelled'],
            datasets: [{
                data: [60, 25, 15],
                borderWidth: 1,
            }]
        }
    });

});
</script>
@endsection
