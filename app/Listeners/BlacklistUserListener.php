<?php

namespace App\Listeners;

use App\Events\BlacklistUserEvent;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BlacklistUserListener
{
   
    public function __construct(public UserRepository $userRepo)
    {
        //
    }

    public function handle(BlacklistUserEvent $event): void
    {
        $this->userRepo->updateBlacklisted($event->user->id,true);
    }
}
