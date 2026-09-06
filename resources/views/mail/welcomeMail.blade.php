<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to StudentJobs</title>
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

                    <!-- Hero -->
                    <tr>
                        <td style="padding:40px 40px 24px 40px; text-align:center;">
                            <h1 style="margin:0 0 16px 0; font-size:26px; color:#212529; font-weight:700;">
                                Welcome, {{ $user->firstName ?? 'there' }}! 👋
                            </h1>
                            <p style="margin:0; font-size:16px; line-height:1.6; color:#6c757d;">
                                We're thrilled to have you on board. Your StudentJobs account is ready to go — start exploring opportunities or post your first job today.
                            </p>
                        </td>
                    </tr>

                    <!-- CTA button -->
                    <tr>
                        <td style="padding:0 40px 32px 40px; text-align:center;">
                            <a href="{{ route('homepage') }}"
                               style="display:inline-block; background-color:#f00505; color:#ffffff; text-decoration:none; font-size:16px; font-weight:600; padding:14px 36px; border-radius:8px;">
                                Get Started
                            </a>
                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="padding:0 40px;">
                            <hr style="border:none; border-top:1px solid #e9ecef; margin:0;">
                        </td>
                    </tr>

                    <!-- Info section -->
                    <tr>
                        <td style="padding:32px 40px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding-bottom:20px;">
                                        <table role="presentation" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="vertical-align:top; padding-right:16px;">
                                                    <div style="width:36px; height:36px; background-color:#fdeaea; border-radius:8px; text-align:center; line-height:36px; font-size:18px;">🔍</div>
                                                </td>
                                                <td style="vertical-align:top;">
                                                    <p style="margin:0 0 4px 0; font-size:15px; font-weight:600; color:#212529;">Find opportunities</p>
                                                    <p style="margin:0; font-size:14px; color:#6c757d; line-height:1.5;">Browse jobs and helper positions that match what you're looking for.</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table role="presentation" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="vertical-align:top; padding-right:16px;">
                                                    <div style="width:36px; height:36px; background-color:#fdeaea; border-radius:8px; text-align:center; line-height:36px; font-size:18px;">📄</div>
                                                </td>
                                                <td style="vertical-align:top;">
                                                    <a href="{{ route('profile') }}" 
                                                    style="margin:0 0 4px 0; font-size:15px; font-weight:600; color:#212529;">Complete your profile</a>
                                                    <a href="{{ route('profile') }}" 
                                                    style="margin:0; font-size:14px; color:#6c757d; line-height:1.5;">Add your details, CV, and preferences to stand out to employers.</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f8f9fa; padding:24px 40px; text-align:center;">
                            <p style="margin:0 0 8px 0; font-size:13px; color:#adb5bd;">
                                &copy; {{ date('Y') }} StudentJobs. All rights reserved.
                            </p>
                            <p style="margin:0; font-size:13px; color:#adb5bd;">
                                If you didn't create this account, you can safely ignore this email.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>