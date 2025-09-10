<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Schedule</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8f9fc;">
    <table cellpadding="0" cellspacing="0"
        style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
        <thead>
            <tr
                style="background-color: #2e2a27; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; font-weight: 700; letter-spacing: 1px;">
                <th scope="col">Assignment Schedule</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 24px 24px;">
                    <div
                        style="padding: 8px; color: #2e2a27; background-color: rgba(79, 70, 229, 0.05); border: 1px solid rgba(79, 70, 229, 0.05); border-radius: 6px; text-align: center; font-size: 16px; font-weight: 600;">
                        Dear {{ $employeeName }},
                    </div>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        You have been assigned to provide care for <strong>{{ $patientName }}</strong>. Below is your schedule:
                    </div>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px;">
                    <table cellpadding="8" cellspacing="0"
                        style="width: 100%; background-color: rgba(76, 70, 229, 0.05); border-radius: 6px;">
                        @php
                            $groupedSlots = [];
                            foreach ($slots as $slot) {
                                $day = ucfirst($slot->day_of_week);
                                $groupedSlots[$day][] = \Carbon\Carbon::parse($slot->start_time)->format('H:i') . ' - ' . \Carbon\Carbon::parse($slot->end_time)->format('H:i');
                            }
                        @endphp

                        @foreach ($groupedSlots as $day => $times)
                        <tr>
                            <td style="font-weight: 600; color: #2e2a27;">{{ $day }}</td>
                            <td style="color: #8492a6;">{{ implode(', ', $times) }}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        Please ensure you adhere to this schedule. Contact your supervisor if you have any questions.
                    </div>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 24px 15px; color: #8492a6;">
                    <div>
                        Best regards,<br>Website-For-Homecare
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
