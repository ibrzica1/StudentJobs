<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Posted Successfully</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, Helvetica, sans-serif;">

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:40px 0;">
        <tr>
            <td align="center">

                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background-color:#f00505; padding:32px 40px; text-align:center;">
                            <img src="{{ asset('storage/images/icons/PageLogo.png') }}" alt="StudentJobs" width="140" style="display:block; margin:0 auto;">
                        </td>
                    </tr>

                    <!-- Success badge -->
                    <tr>
                        <td style="padding:40px 40px 16px 40px; text-align:center;">
                            <div style="width:56px; height:56px; background-color:#e8f5e9; border-radius:50%; margin:0 auto 20px auto; text-align:center; line-height:56px; font-size:28px;">
                                ✅
                            </div>
                            <h1 style="margin:0 0 12px 0; font-size:24px; color:#212529; font-weight:700;">
                                Your job has been posted!
                            </h1>
                            <p style="margin:0; font-size:15px; line-height:1.6; color:#6c757d;">
                                Your listing is now live and visible to students on StudentJobs.
                            </p>
                        </td>
                    </tr>

                    <!-- Job details card -->
                    <tr>
                        <td style="padding:8px 40px 32px 40px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f8f9fa; border-radius:10px; border:1px solid #e9ecef;">
                                <tr>
                                    <td style="padding:24px;">
                                        <p style="margin:0 0 4px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                            Job Title
                                        </p>
                                        <h2 style="margin:0 0 20px 0; font-size:20px; color:#f00505; font-weight:700;">
                                            {{ $job->title }}
                                        </h2>

                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="50%" style="vertical-align:top; padding-bottom:16px;">
                                                    <p style="margin:0 0 4px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                                        Location
                                                    </p>
                                                    <p style="margin:0; font-size:14px; color:#212529;">
                                                        {{ $job->location->city ?? '—' }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="vertical-align:top;">
                                                    <p style="margin:0 0 4px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                                        Wage
                                                    </p>
                                                    <p style="margin:0; font-size:14px; color:#212529;">
                                                        €{{ $job->wage }} / hour
                                                    </p>
                                                </td>
                                                <td width="50%" style="vertical-align:top;">
                                                    <p style="margin:0 0 4px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                                        Start Date
                                                    </p>
                                                    <p style="margin:0; font-size:14px; color:#212529;">
                                                        {{ \Carbon\Carbon::parse($job->start_date)->format('d.m.Y') }}
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- CTA button -->
                    <tr>
                        <td style="padding:0 40px 40px 40px; text-align:center;">
                            <a href="{{ route('job.show', ['job' => $job->id]) }}"
                               style="display:inline-block; background-color:#f00505; color:#ffffff; text-decoration:none; font-size:16px; font-weight:600; padding:14px 36px; border-radius:8px;">
                                View Your Listing
                            </a>
                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="padding:0 40px;">
                            <hr style="border:none; border-top:1px solid #e9ecef; margin:0;">
                        </td>
                    </tr>

                    <!-- Next steps -->
                    <tr>
                        <td style="padding:32px 40px;">
                            <p style="margin:0 0 12px 0; font-size:13px; text-transform:uppercase; letter-spacing:0.5px; color:#adb5bd; font-weight:600;">
                                What happens next?
                            </p>
                            <p style="margin:0; font-size:14px; line-height:1.6; color:#6c757d;">
                                Students matching your criteria will be able to view and apply to this job. You'll be notified as soon as someone applies. You can edit or remove this listing anytime from your <a href="{{ route('job.my-ads') }}" style="color:#f00505; text-decoration:none; font-weight:600;">My Ads</a> page.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f8f9fa; padding:24px 40px; text-align:center;">
                            <p style="margin:0 0 8px 0; font-size:13px; color:#adb5bd;">
                                &copy; {{ date('Y') }} StudentJobs. All rights reserved.
                            </p>
                            <p style="margin:0; font-size:13px; color:#adb5bd;">
                                You're receiving this email because you posted a job on StudentJobs.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>