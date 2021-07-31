<?php

namespace App\Listeners\LoginAttempts;

use App\Repositories\LoginAttemptsRepository;

class LogAuthenticationAttempt extends BaseLoginAttemptListener
{
    /**
     * Create the event listener.
     *
     * @param LoginAttemptsRepository $loginAttemptsRepository
     */
    public function __construct(LoginAttemptsRepository $loginAttemptsRepository)
    {
        parent::__construct('Authentication Attempt', $loginAttemptsRepository);
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
