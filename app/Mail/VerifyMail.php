<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        

        return $this->from('MixN@neilResume.test')
                ->subject('恭喜你成功註冊MixN的會員')
                ->view('emails.verifyUser')
                ->with([
                    'color' => 'info',
                    'url' => url('/user/verify') .'/' . $this->user->email_token .'?expires=' . Carbon::today()->addWeeks(1),
                    'slot' => 'click to verify user',
                    ]);
    }
}
