<?php


namespace App\Repositories;


use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class SessionRepository
 * @package App\Repositories
 */
class SessionRepository
{
    /**
     * @param int $userId
     * @return Session[]|Collection
     */
    public function getSessionByUserId(int $userId)
    {
        return Session::where('user_id', $userId)->where('last_activity', '>', Carbon::now()->subMinutes(env('SESSION_LIFETIME')))->get();
    }
}
