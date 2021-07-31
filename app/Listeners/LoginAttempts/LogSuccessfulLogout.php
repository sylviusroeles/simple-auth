<?php

namespace App\Listeners\LoginAttempts;

use App\Repositories\LoginAttemptsRepository;

class LogSuccessfulLogout extends BaseLoginAttemptListener
{
    /**
     * Create the event listener.
     *
     * @param LoginAttemptsRepository $loginAttemptsRepository
     */
    public function __construct(LoginAttemptsRepository $loginAttemptsRepository)
    {
        parent::__construct('Logout', $loginAttemptsRepository);
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        parent::handle($event);
    }
}
