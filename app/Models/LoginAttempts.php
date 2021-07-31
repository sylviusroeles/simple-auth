<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 * @package App\Models
 * @property int $id
 * @property int $user_id
 * @property string $ip_address
 * @property string $user_agent
 * @property string $action
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class LoginAttempts extends Model
{
    use HasFactory;

    protected $table = 'login_attempts';

    protected $hidden = [];

    protected $guarded = [];

}
