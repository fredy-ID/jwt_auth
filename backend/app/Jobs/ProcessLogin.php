<?php

namespace App\Jobs;

use App\Models\LockedUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ProcessLogin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The lockedUser instance.
     * 
     * @var \App\Models\LockedUser
     */
    private $lockedUser;

    /**
     * 
     * @var array
     */
    private $time;

    /**
     * Create a new job instance.
     * 
     * @var 
     *
     * @return void
     */
    public function __construct(int $lockedUser, int $time)
    {
        $this->lockedUser = $lockedUser;
        $this->time = $time;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $removeLockedUser = DB::table('locked_users')
        ->where('users_id', $this->lockedUser)
        ->delete();
    }
}