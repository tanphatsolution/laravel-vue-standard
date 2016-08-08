<?php

namespace App\Eloquent;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use App\Traits\Eloquent\GetImageTrait;

class User extends Authenticatable
{
    use HasRolesAndAbilities, GetImageTrait;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'image','locked',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function receiverNotifications()
    {
        return $this->hasMany(Notification::class, 'receiver_id');
    }

    public function receiverNotificationsNotRead()
    {
        return $this->receiverNotifications()->where('read',0)->where('guard','backend')->orderBy('id','DESC');
    }

    public function receiverNotificationsNotReadLimit()
    {
        return $this->receiverNotificationsNotRead()->take(10);
    }
}
