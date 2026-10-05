<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('jobBillPdf.Invoice') }} {{ $bill->bill_number }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #333333;
            background-color: #f4f4f7;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }

        .invoice-header {
            background-color: #ffffff;
            border-bottom: 3px solid #f00505;
            padding: 20px 30px;
        }

        .invoice-title {
            color: #f00505;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .email-body {
            padding: 30px;
        }

        .greeting {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333333;
        }

        .message-box {
            background-color: #f8f9fa;
            border-left: 4px solid #f00505;
            padding: 15px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .section-title {
            color: #f00505;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .bank-info-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 25px;
        }

        .bank-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .bank-row:last-child {
            margin-bottom: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        .table thead th {
            background-color: #f00505;
            color: #ffffff;
            font-weight: bold;
            padding: 10px;
            text-align: left;
            border: 1px solid #f00505;
            font-size: 13px;
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

        .text-end {
            text-align: right;
        }

        .text-muted {
            color: #777777;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 30px;
            border-top: 2px solid #f00505;
            text-align: center;
            color: #666666;
            font-size: 12px;
        }

        .service-note {
            font-size: 11px;
            color: #888888;
            text-align: center;
            padding: 15px 30px 25px 30px;
            line-height: 1.4;
        }
    </style>
</head>
<body>
    <?php 
    use App\Models\Bill;
use App\Services\MoneyService;

    $moneyService = new MoneyService();
    ?>
    <div class="email-wrapper">
        <!-- Header -->
        <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
            <tr>
                <td class="invoice-header">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <img src="{{ public_path('storage/images/PageLogo.png') }}" style="width: 130px;" alt="Logo">
                            </td>
                            <td class="text-end">
                                <div class="invoice-title">{{ __('jobBillPdf.Invoice') }}</div>
                                <div class="text-muted">#{{ $bill->bill_number }}</div>
                                <div class="text-muted">{{ $bill->created_at->format('d.m.Y') }}</div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Body Content -->
        <div class="email-body">
            <div class="greeting">
                {{ __('jobBillPdf.Hello Mr.') }} {{ $bill->user->lastName }},
            </div>

            <div class="message-box">
                {{ __('jobBillPdf.Your invoice is attached to this email. Thank you for using StudentJobs. This invoice covers the publication of your job advertisement. Please use the invoice number as a reference when making your payment.') }}
            </div>

            <!-- Items Table -->
            <table class="table">
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

            <!-- Account Details / Bank Section -->
            <div class="section-title">{{ __('jobBillPdf.Bank Account Details') }} </div>
            <div class="bank-info-box">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding-bottom: 6px;" class="text-muted">Recipient:</td>
                        <td style="padding-bottom: 6px;" class="text-end fw-bold">Student Placement JOB QUANTITY</td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 6px;" class="text-muted">{{ __('jobBillPdf.Bank') }}:</td>
                        <td style="padding-bottom: 6px;" class="text-end fw-bold">{{ env('COMPANY_BANK') }}</td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 6px;" class="text-muted">{{ __('jobBillPdf.Iban') }}:</td>
                        <td style="padding-bottom: 6px;" class="text-end fw-bold">{{ env('COMPANY_IBAN') }}</td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 6px;" class="text-muted">{{ __('jobBillPdf.BIC') }}:</td>
                        <td style="padding-bottom: 6px;" class="text-end fw-bold">{{ env('COMPANY_BIC') }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Purpose of use:</td>
                        <td class="text-end fw-bold" style="color: #f00505;">{{ $bill->bill_number }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0 0 5px 0; font-weight: bold;">{{ __('jobBillPdf.Your Student Job Team') }}</p>
            <p style="margin: 0;">StudentJobs &middot; {{ env('COMPANY_URL') }}</p>
        </div>

        <!-- Service notification notice -->
        <div class="service-note">
            {{ __('jobBillPdf.This email is a service notification and not a newsletter. Therefore, it is not possible to unsubscribe from this type of email.') }}
        </div>
    </div>
</body>
</html>