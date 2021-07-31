<?php

namespace App\Listeners\LoginAttempts;

use App\Models\User;
use App\Repositories\LoginAttemptsRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BaseLoginAttemptListener
{
    /** @var string */
    protected $action;

    /** @var LoginAttemptsRepository */
    protected $loginAttemptsRepository;

    /**
     * BaseLoginAttemptListener constructor.
     * @param string $action
     * @param LoginAttemptsRepository $loginAttemptsRepository
     */
    public function __construct(string $action, LoginAttemptsRepository $loginAttemptsRepository)
    {
        $this->action = $action;
        $this->loginAttemptsRepository = $loginAttemptsRepository;
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $user = null;

        if (request()->user()) {
            $user = request()->user();
        } else {
            if (isset($event->credentials['email'])) {
                $user = User::where('email', $event->credentials['email'])->first();
            }
        }

        $this->loginAttemptsRepository->store([
            'user_id' => $user->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'action' => $this->action,
        ]);
    }
}
