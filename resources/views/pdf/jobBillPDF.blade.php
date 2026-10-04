<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('jobBillPdf.Invoice') }} {{ $bill->bill_number }}</title>
    <style>
        @page {
            margin: 35px 40px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333333;
            line-height: 1.5;
        }

        .invoice-header {
            border-bottom: 3px solid #f00505;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .invoice-title {
            color: #f00505;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .section-title {
            color: #f00505;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .company-info p,
        .customer-info p,
        .bank-info p {
            margin-bottom: 4px;
        }

        .table thead th {
            background-color: #f00505;
            color: #ffffff;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #f00505;
        }

        .table tbody td {
            padding: 10px;
            border: 1px solid #dee2e6;
        }

        .total-row td {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .grand-total {
            color: #f00505;
            font-size: 15px;
        }

        .message-box {
            background-color: #f8f9fa;
            border-left: 4px solid #f00505;
            padding: 15px;
            margin-top: 25px;
        }

        .bank-section {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #dee2e6;
        }

        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 2px solid #f00505;
            text-align: center;
            color: #666666;
            font-size: 11px;
        }

        .text-muted {
            color: #777777;
        }
    </style>
</head>
<body>
    <?php 
    use App\Models\Bill;
    use App\Services\MoneyService;

    $moneyService = new MoneyService();
    ?>
    <div class="container-fluid p-0">
        <div class="row invoice-header align-items-center">
            <div class="col-6">
                <img src="{{ public_path('storage/images/PageLogo.png') }}" style="width: 150px;">
            </div>
            <div class="col-6 text-end">
                <div class="invoice-title">{{ __('jobBillPdf.Invoice') }}</div>
                <div class="text-muted">#{{ $bill->bill_number }}</div>
                <div class="text-muted">{{ $bill->created_at->format('d.m.Y') }}</div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-6 customer-info">
                <div class="section-title">{{ __('jobBillPdf.Invoice') }}</div>
                <p class="fw-bold">{{ $bill->user->firstName }} {{ $bill->user->lastName }}</p>
                <p>{{ $bill->user->street }} {{ $bill->user->house_number }}</p>
                <p>{{ $bill->location->city ?? '' }}</p>
            </div>

            <div class="col-6 company-info text-end">
                <div class="section-title">{{ __('jobBillPdf.Company') }}</div>
                <p class="fw-bold">{{ env('COMPANY_NAME') }}</p>
                <p>{{ env('COMPANY_STREET') }}</p>
                <p>{{ env('COMPANY_POSTAL_CODE') }} {{ env('COMPANY_CITY') }}</p>
                <p>{{ env('COMPANY_COUNTRY') }}</p>
                <p class="mt-3 fw-bold">{{ __('jobBillPdf.Contact') }}</p>
                <p>{{ env('COMPANY_TELEPHONE') }}</p>
                <p>{{ env('COMPANY_EMAIL') }}</p>
                <p>{{ env('COMPANY_URL') }}</p>
            </div>
        </div>

        <div class="mb-4">
            <div class="section-title">{{ __('jobBillPdf.Invoice') }}</div>
            <div class="row">
                <div class="col-6">
                    <span class="text-muted">{{ __('jobBillPdf.Invoice') }}:</span>
                </div>
                <div class="col-6 text-end fw-bold">
                    {{ $bill->bill_number }}
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="text-muted">{{ __('jobBillPdf.Bill created') }}:</span>
                </div>
                <div class="col-6 text-end">
                    {{ $bill->created_at->format('d.m.Y') }}
                </div>
            </div>
        </div>

        <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th style="width: 60%;">{{ __('jobBillPdf.Item') }}</th>
                    <th class="text-end">{{ __('jobBillPdf.EUR') }}</th>
                    <th class="text-end">{{ __('jobBillPdf.Bruto') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ __('jobBillPdf.Job Ad') }}</td>
                    <td class="text-end">EUR</td>
                    <td class="text-end">{{ number_format(Bill::JOB_AD_PRICE, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>{{ __('jobBillPdf.Tax') }} {{ Bill::TAX }}%</td>
                    <td class="text-end">EUR</td>
                    <td class="text-end">
                        {{ number_format($moneyService->calculateTax(Bill::JOB_AD_PRICE, Bill::TAX), 2, ',', '.') }}
                    </td>
                </tr>
                <tr class="total-row">
                    <td colspan="2" class="text-end">{{ __('jobBillPdf.Total') }}</td>
                    <td class="text-end grand-total">
                        {{ number_format($bill->amount, 2, ',', '.') }} EUR
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="message-box">
            <div class="fw-bold mb-2">{{ __('jobBillPdf.Message') }}</div>
            <p class="mb-0">
                Thank you for using StudentJobs. This invoice covers the publication of your job advertisement. Please use the invoice number as a reference when making your payment.
            </p>
        </div>

        <div class="bank-section">
            <div class="section-title">{{ __('jobBillPdf.Bank') }}</div>
            <div class="row bank-info">
                <div class="col-4">
                    <p class="text-muted">{{ __('jobBillPdf.Bank') }}</p>
                    <p class="fw-bold">{{ env('COMPANY_BANK') }}</p>
                </div>
                <div class="col-4">
                    <p class="text-muted">{{ __('jobBillPdf.Iban') }}</p>
                    <p class="fw-bold">{{ env('COMPANY_IBAN') }}</p>
                </div>
                <div class="col-4">
                    <p class="text-muted">{{ __('jobBillPdf.BIC') }}</p>
                    <p class="fw-bold">{{ env('COMPANY_BIC') }}</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p class="fw-bold mb-1">{{ __('jobBillPdf.Your Student Job Team') }}</p>
            <p class="mb-0">StudentJobs · {{ env('COMPANY_URL') }}</p>
        </div>
    </div>
</body>
</html>