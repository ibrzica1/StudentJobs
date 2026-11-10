<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <title>{{ __('jobBillPdf.Invoice') }} {{ $bill->bill_number }}</title>
    @push('styles')
    @vite(['resources/css/billJobAdd.css'])
    @endpush
</head>

<body>
    <?php

    use App\Models\Bill;
    use App\Services\MoneyService;
    use App\Enums\BillPricesEnum;

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
                        <td class="text-end">{{ number_format(BillPricesEnum::JOB_AD_PRICE->value, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('jobBillPdf.Tax') }} {{ BillPricesEnum::TAX->value }}%</td>
                        <td class="text-end">EUR</td>
                        <td class="text-end">
                            {{ number_format($moneyService->calculateTax(BillPricesEnum::JOB_AD_PRICE->value, BillPricesEnum::TAX->value), 2, ',', '.') }}
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