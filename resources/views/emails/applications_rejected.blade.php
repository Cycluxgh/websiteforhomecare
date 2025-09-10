<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Application Update</title>
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
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>Dear {{ $application->full_name }},</div>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        Thank you for your interest in <strong>{{ $application->jobPosting->job_title }}</strong> at <strong>Website-For-Homecare</strong> and for taking the time to submit your application.
                    </div>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        After careful consideration, we regret to inform you that your application was not successful at this time.
                    </div>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        The selection process was highly competitive, and we have decided to move forward with other candidates whose qualifications and experience more closely align with the requirements for this opportunity.
                    </div>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        We appreciate your interest in our company and encourage you to consider future opportunities that may be a better fit for your skills and experience.
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
                    <div>
                        The Website-For-Homecare Team <br>
                        Recruitment Department
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
