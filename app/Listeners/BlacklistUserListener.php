<?php

namespace App\Listeners;

use App\Events\BlacklistUserEvent;
use App\Interfaces\UserRepositoryInterface;

class BlacklistUserListener
{
    private UserRepositoryInterface $userRepo;
   
    public function __construct(public UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepo = $userRepositoryInterface;
    }

    public function handle(BlacklistUserEvent $event): void
    {
        $this->userRepo->updateBlacklisted($event->user->id,true);
    }
}
