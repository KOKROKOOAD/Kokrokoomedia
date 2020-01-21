<?php

namespace App\Console\Commands;

use App\Models\ScheduledAd;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CheckSubsEndTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkSubEndTime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $dueAds = ScheduledAd::where('end', '=',substr(Carbon::now()->toDateString(),0,16))->whereStatus('Live')->update([
            'status' => 'completed'
        ]);
    }
}
