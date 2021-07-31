<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 * @package App\Models
 * @property string $id
 * @property int $user_id
 * @property string $ip_address
 * @property string $user_agent
 * @property string $payload
 * @property Carbon $last_activity
 */
class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions';

    protected $hidden = [];

    protected $fillable = [];

    protected $casts = [
        'last_activity' => 'datetime',
    ];
}
