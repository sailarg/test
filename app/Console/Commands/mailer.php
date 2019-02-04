<?php

namespace App\Console\Commands;

use App\Mail\HourlyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class mailer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sending:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviando correos cada hora';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Mail::to(env('MAIL_RECEIVER'))->send(new HourlyMail());
    }
}
