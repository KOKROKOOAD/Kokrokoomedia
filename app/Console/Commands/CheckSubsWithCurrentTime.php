<?php

namespace App\Console\Commands;

use App\Models\ScheduledAd;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CheckSubsWithCurrentTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkSubsWithCurrentTime';

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
        $dueAds = ScheduledAd::where('start', 'like', '%' . substr(Carbon::now()->toDateString(),10,6) . '%')->whereStatus('active')->update([
            'status' => 'live'
        ]);
    }
}
