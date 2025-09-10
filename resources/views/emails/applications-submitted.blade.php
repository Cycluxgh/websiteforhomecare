<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submitted</title>
    <style>
        /* Ensure consistent rendering across email clients */
        body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
        p { display: block; margin: 13px 0; }
    </style>
</head>

<body style="margin: 0; padding: 0; background-color: #f8f9fc;">
    <table cellpadding="0" cellspacing="0"
        style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">

        <thead>
            <tr
                style="background-color: #2e2a27; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; font-weight: 700; letter-spacing: 1px;">
                <th scope="col">Website-For-Homecare</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td style="padding: 24px 24px 15px; color: #8492a6;">
                    <div>Dear {{ $application->full_name }},</div>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        Thank you for submitting your application for the job posting. We have received your application successfully.
                    </div>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <h3 style="font-size: 18px; margin-top: 20px; margin-bottom: 10px; color: #333;">Here are some of the details you provided:</h3>
                    <ul style="list-style-type: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 8px;"><strong>Full Name:</strong> {{ $application->full_name }}</li>
                        <li style="margin-bottom: 8px;"><strong>Email:</strong> {{ $application->email }}</li>
                        <li style="margin-bottom: 8px;"><strong>Job Title:</strong> {{ $application->jobPosting->job_title }}</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        We will review your application and get back to you as soon as possible.
                    </div>
                </td>
            </tr>

            <tr>
                <td style="padding: 15px 24px 0; color: #8492a6;">
                    <div>Sincerely,</div>
                </td>
            </tr>

            <tr>
                <td style="padding: 15px 24px 15px; color: #8492a6;">
                    <div style="margin-top: 5px;">
                        The Website-For-Homecare Team
                    </div>
                </td>
            </tr>

            <tr>
                <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
                    &copy; {{ date('Y') }} Website-For-Homecare. All rights reserved.
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
