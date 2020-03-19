<?php

namespace App\Jobs;

use App\Services\SendTextMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendAdminCredentialsTextJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   public $name;
   public $email;
   public $password;
   public $sms_account_name;
   public $sms_account_pass;
   public $phone;



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name,$email,$password,$sms_account_name,$sms_account_pass,$phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->sms_account_name = $sms_account_name;
        $this->sms_account_pass = $sms_account_pass;
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sendSMS = new SendTextMessage();
        $sendSMS->message(
            $this->name,
            $this->email,
            $this->password,
            $this->sms_account_name,
            $this->sms_account_pass,
            $this->phone
    );
    }
}
