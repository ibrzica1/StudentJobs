<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('mail.Application Accepted') }}</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f4f4; font-family:Arial, Helvetica, sans-serif;">

<table role="presentation" width="100%" cellpadding="0" cellspacing="0"
       style="background-color:#f4f4f4; padding:40px 0;">

```
<tr>
    <td align="center">

        <table role="presentation" width="600" cellpadding="0" cellspacing="0"
               style="background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.08);">

            <!-- Header -->
            <tr>
                <td style="background-color:#f00505; padding:32px 40px; text-align:center;">

                    <img src="{{ asset('storage/images/icons/PageLogo.png') }}"
                         alt="StudentJobs"
                         width="140"
                         style="display:block; margin:0 auto;">

                </td>
            </tr>

            <!-- Success message -->
            <tr>
                <td style="padding:40px 40px 24px 40px; text-align:center;">

                    <div style="width:56px; height:56px; background-color:#e8f5e9; border-radius:50%; margin:0 auto 20px auto; text-align:center; line-height:56px; font-size:28px; color:#2e7d32;">
                        ✓
                    </div>

                    <h1 style="margin:0 0 12px 0; font-size:24px; color:#212529; font-weight:700;">
                        {{ __('mail.Application accepted') }}
                    </h1>

                    <p style="margin:0; font-size:15px; line-height:1.6; color:#6c757d;">
                        {{ __('mail.You have accepted the application for your job. You can now contact the student directly using the contact information below.') }}
                    </p>

                </td>
            </tr>

            <!-- Job -->
            <tr>
                <td style="padding:8px 40px 24px 40px;">

                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                           style="background-color:#f8f9fa; border-radius:10px; border:1px solid #e9ecef;">

                        <tr>
                            <td style="padding:24px;">

                                <p style="margin:0 0 4px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                    {{ __('mail.Job') }}
                                </p>

                                <h2 style="margin:0 0 16px 0; font-size:20px; color:#f00505; font-weight:700;">
                                    {{ $application->job->title }}
                                </h2>

                                <p style="margin:0; font-size:14px; color:#212529;">
                                    <strong>{{ __('mail.Location') }}:</strong>
                                    {{ $application->job->location->city ?? '—' }}
                                </p>

                            </td>
                        </tr>

                    </table>

                </td>
            </tr>

            <!-- Student information -->
            <tr>
                <td style="padding:0 40px 32px 40px;">

                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                           style="background-color:#ffffff; border-radius:10px; border:1px solid #e9ecef;">

                        <tr>
                            <td style="padding:24px;">

                                <p style="margin:0 0 16px 0; font-size:13px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                    {{ __('mail.Student Information') }}
                                </p>

                                <!-- Student name -->
                                <h2 style="margin:0 0 20px 0; font-size:20px; color:#212529; font-weight:700;">
                                    {{ $application->user->firstName }}
                                    {{ $application->user->lastName }}
                                </h2>

                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0">

                                    <!-- Location -->
                                    <tr>
                                        <td style="padding-bottom:14px;">

                                            <p style="margin:0 0 4px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                                {{ __('mail.Location') }}
                                            </p>

                                            <p style="margin:0; font-size:14px; color:#212529;">
                                                {{ $application->user->location->city ?? '—' }}
                                            </p>

                                        </td>
                                    </tr>

                                    <!-- University -->
                                    <tr>
                                        <td style="padding-bottom:14px;">

                                            <p style="margin:0 0 4px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                                {{ __('mail.University') }}
                                            </p>

                                            <p style="margin:0; font-size:14px; color:#212529;">
                                                {{ $application->user->university ?? '—' }}
                                            </p>

                                        </td>
                                    </tr>

                                    <!-- Email -->
                                    <tr>
                                        <td style="padding-bottom:14px;">

                                            <p style="margin:0 0 4px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                                {{ __('mail.Email') }}
                                            </p>

                                            <p style="margin:0; font-size:14px; color:#212529;">
                                                <a href="mailto:{{ $application->user->email }}"
                                                   style="color:#f00505; text-decoration:none; font-weight:600;">
                                                    {{ $application->user->email }}
                                                </a>
                                            </p>

                                        </td>
                                    </tr>

                                    <!-- Phone -->
                                    <tr>
                                        <td>

                                            <p style="margin:0 0 4px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                                {{ __('mail.Phone') }}
                                            </p>

                                            <p style="margin:0; font-size:14px; color:#212529;">
                                                <a href="tel:{{ $application->user->telephone }}"
                                                   style="color:#f00505; text-decoration:none; font-weight:600;">
                                                    {{ $application->user->telephone }}
                                                </a>
                                            </p>

                                        </td>
                                    </tr>

                                </table>

                            </td>
                        </tr>

                    </table>

                </td>
            </tr>

            <!-- CTA -->
            <tr>
                <td style="padding:0 40px 40px 40px; text-align:center;">

                    <a href="{{ route('job.show', ['job' => $application->job->id]) }}"
                       style="display:inline-block; background-color:#f00505; color:#ffffff; text-decoration:none; font-size:16px; font-weight:600; padding:14px 36px; border-radius:8px;">
                        {{ __('mail.View Job') }}
                    </a>

                </td>
            </tr>

            <!-- Divider -->
            <tr>
                <td style="padding:0 40px;">

                    <hr style="border:none; border-top:1px solid #e9ecef; margin:0;">

                </td>
            </tr>

            <!-- Contact message -->
            <tr>
                <td style="padding:32px 40px;">

                    <p style="margin:0 0 12px 0; font-size:13px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                        {{ __('mail.Next step') }}
                    </p>

                    <p style="margin:0; font-size:14px; line-height:1.6; color:#6c757d;">
                        {{ __('mail.Please contact the student directly using the email address or phone number provided above to arrange the next steps.') }}
                    </p>

                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td style="background-color:#f8f9fa; padding:24px 40px; text-align:center;">

                    <p style="margin:0 0 8px 0; font-size:13px; color:#adb5bd;">
                        &copy; {{ date('Y') }}
                        {{ __('mail.StudentJobs. All rights reserved.') }}
                    </p>

                    <p style="margin:0; font-size:13px; color:#adb5bd;">
                        {{ __('mail.You are receiving this email because you accepted a student application on StudentJobs.') }}
                    </p>

                </td>
            </tr>

        </table>

    </td>
</tr>
```

</table>

</body>
</html>
