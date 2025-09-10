<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website-For-Homecare</title>
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
                <td style="padding: 24px 24px;">
                    <div
                        style="padding: 8px; color: #2e2a27; background-color: rgba(79, 70, 229, 0.05); border: 1px solid rgba(79, 70, 229, 0.05); border-radius: 6px; text-align: center; font-size: 16px; font-weight: 600;">
                        Dear {{ $user->name }},
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        We are pleased to offer you a conditional offer of employment for the position of {{ $position }} at Website-For-Homecare Ltd at a rate of £{{ number_format($hourly_rate, 2) }} per hour, starting on {{ $start_date }}.
                    </div>
                </td>
            </tr>
            @if($welcome_message)
            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        {!! $welcome_message !!}
                    </div>
                </td>
            </tr>
            @endif
            <tr>
                <td style="padding: 0 24px 15px;">
                    <table cellpadding="8" cellspacing="0"
                        style="width: 100%; background-color: rgba(76, 70, 229, 0.05); border-radius: 6px;">
                        <tr>
                            <td style="font-weight: 600; color: #2e2a27;">Email:</td>
                            <td style="color: #8492a6;">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600; color: #2e2a27;">Password:</td>
                            <td style="color: #8492a6;">{{ $password }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        Please use your employee login credentials above to upload all requested documents and complete the questionnaire and medical assessment form.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        Please log in to the system and change your password as soon as possible.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 15px 24px; text-align: center;">
                    <a href="{{ url('/login') }}"
                        style="padding: 8px 20px; outline: none; text-decoration: none; font-size: 16px; letter-spacing: 0.5px; transition: all 0.3s; font-weight: 600; border-radius: 6px; background-color: #2e2a27; border: 1px solid #2e2a27; color: #ffffff; display: inline-block;">
                        Log In Here
                    </a>
                </td>
            </tr>
            <tr>
                <td style="padding: 15px 24px 0; color: #8492a6;">
                    <div>
                        If you have any questions or require further information, please do not hesitate to contact us.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 15px 24px 15px; color: #8492a6;">
                    HR Department <br> Support Team
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
