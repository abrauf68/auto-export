<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ \App\Helpers\Helper::getCompanyName() }} - Billing #{{ $billing->id }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e6e6e6;
            padding: 20px;
        }

        .invoice {
            width: 800px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border: 1px solid #ccc;
        }

        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            height: 60px;
        }

        .header h1 {
            margin: 5px 0;
            font-size: 26px;
            letter-spacing: 1px;
        }

        .header p {
            margin: 2px 0;
            font-size: 13px;
        }

        /* INFO */
        .info {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 13px;
        }

        .info div {
            width: 48%;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 13px;
        }

        th {
            background: #d6dee8;
            padding: 8px;
            border: 1px solid #999;
        }

        td {
            padding: 8px;
            border: 1px solid #999;
        }

        .text-right {
            text-align: right;
        }

        /* TOTAL BOX */
        .total-row td {
            font-weight: bold;
        }

        .final-total {
            color: red;
            font-size: 16px;
        }

        /* TERMS */
        .terms {
            margin-top: 20px;
            background: #d6dee8;
            padding: 10px;
            font-size: 13px;
            text-align: center;
        }

        /* FOOTER */
        .footer {
            margin-top: 20px;
            font-size: 12px;
            display: flex;
            justify-content: space-between;
        }

        .signature {
            margin-top: 30px;
            text-align: right;
        }

        @media print {
            body {
                background: none;
            }

            .invoice {
                border: none;
            }
        }

        /* WATERMARK */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 90px;
            font-weight: bold;
            opacity: 0.15;
            pointer-events: none;
            z-index: 0;
            white-space: nowrap;
        }

        .watermark.paid {
            color: green;
        }

        .watermark.unpaid {
            color: red;
        }

        .watermark.partial {
            color: orange;
        }

        /* Ensure content stays above watermark */
        .invoice {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>

    @php
        $settings = \App\Models\SystemSetting::first();
    @endphp

    <div class="invoice">
        <!-- WATERMARK -->
        <div class="watermark {{ $billing->status }}">
            {{ strtoupper($billing->status) }}
        </div>
        <!-- HEADER -->
        <div class="header">
            <img style="height: 40px;" src="{{ asset(\App\Helpers\Helper::getLogoLight()) }}">
            {{-- <h1>{{ \App\Helpers\Helper::getCompanyName() }}</h1> --}}
            <p>{{ \App\Helpers\Helper::getCompanyAddress() ?? 'Karachi, Pakistan' }}</p>
            <p>{{ \App\Helpers\Helper::getCompanyPhone() ?? '' }}</p>
            <p>{{ \App\Helpers\Helper::getCompanyEmail() ?? '' }}</p>
        </div>

        <!-- INFO -->
        <div class="info">
            <div>
                <strong>Office / Service Address:</strong><br>
                <strong>Case Refer To:</strong> {{ $billing->vehicleCase->case_refer_to }}<br>
                <strong>Mobile:</strong> {{ $billing->vehicleCase->mobile_no }}
            </div>

            <div class="text-right">
                <strong>Case No:</strong> #{{ $billing->vehicleCase->case_no }}<br>
                <strong>Date:</strong> {{ \Carbon\Carbon::parse($billing->billing_date)->format('d M Y') }}<br>
                <strong>Customer:</strong> {{ $billing->vehicleCase->submitted_by }}<br>
                <strong>Vehicle Regd:</strong> {{ $billing->vehicleCase->vehicle_reg_no }}
            </div>
        </div>

        <!-- ITEMS -->
        <table>
            <thead>
                <tr>
                    <th>Services</th>
                    <th>Date</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($billing->items as $item)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($billing->billing_date)->format('d M Y') }}</td>
                        <td class="text-right">{{ number_format($item->item_amount, 2) }}</td>
                    </tr>
                @endforeach

                <tr class="total-row">
                    <td colspan="2" class="text-right">Sub Total</td>
                    <td class="text-right">{{ number_format($billing->total_amount, 2) }}</td>
                </tr>

                <tr>
                    <td colspan="2" class="text-right">Paid</td>
                    <td class="text-right">{{ number_format($billing->paid_amount, 2) }}</td>
                </tr>

                <tr>
                    <td colspan="2" class="text-right">Remaining</td>
                    <td class="text-right">{{ number_format($billing->remaining_amount, 2) }}</td>
                </tr>

                <tr class="total-row">
                    <td colspan="2" class="text-right final-total">Total</td>
                    <td class="text-right final-total">{{ number_format($billing->total_amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- TERMS -->
        <div class="terms">
            Terms: Payment due in 30 days
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <div>

                <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data={{ urlencode(route('frontend.billing.verify', $billing->id ?? '00000')) }}&margin=0&ecc=H"
                    alt="Verify Bill" class="qr-code" style="margin-top:8px;">
                <br><br>Scan this QR code to verify the bill.<br>
                Thank you for your business
            </div>

            <div class="signature">
                <img src="{{ asset('assets/img/stamp/stamp.png') }}"
                    style="height: 60px; display:block; margin-left:auto; margin-bottom:5px;">
                _______________________<br>
                Authorized Signature
            </div>
        </div>

    </div>

</body>

</html>

