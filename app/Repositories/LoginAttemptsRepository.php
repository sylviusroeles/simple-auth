<?php


namespace App\Repositories;


use App\Models\LoginAttempts;
use Illuminate\Support\Collection;

/**
 * Class LoginAttemptsRepository
 * @package App\Repositories
 */
class LoginAttemptsRepository
{
    /**
     * @param int $userId
     * @return LoginAttempts[]|Collection
     */
    public function getByUserId(int $userId)
    {
        return LoginAttempts::where('user_id', $userId)->orderBy('created_at', 'DESC')->get();
    }

    /**
     * @param array $attributes
     * @return bool
     */
    public function store(array $attributes)
    {
        return (new LoginAttempts($attributes))->save();
    }
}
