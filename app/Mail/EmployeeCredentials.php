<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeCredentials extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    public $welcome_message;
    public $position;
    public $hourly_rate;
    public $start_date;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\User $user
     * @param string $password
     * @param string|null $welcome_message
     * @param string $position
     * @param float $hourly_rate
     * @param string $start_date
     * @return void
     */
    public function __construct($user, $password, $welcome_message, $position, $hourly_rate, $start_date)
    {
        $this->user = $user;
        $this->password = $password;
        $this->welcome_message = $welcome_message;
        $this->position = $position;
        $this->hourly_rate = $hourly_rate;
        $this->start_date = $start_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Conditional Offer and Employee Account Credentials')
                    ->view('emails.employee_credentials')
                    ->with([
                        'user' => $this->user,
                        'password' => $this->password,
                        'welcome_message' => $this->welcome_message,
                        'position' => $this->position,
                        'hourly_rate' => $this->hourly_rate,
                        'start_date' => $this->start_date,
                    ]);
    }
}
