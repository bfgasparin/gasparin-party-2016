<?php

namespace App;

use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'social_avatar', 'avatar', 'facebook_id', 'google_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'avatar_url'
    ];
    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getAvatarUrlAttribute()
    {
        $avatar =  $this->avatar ?: $this->social_avatar;

        return Storage::url($avatar);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    protected static function boot()
    {
        static::creating(function (User $user) {
            $user->email_token = bcrypt($user->email);
        });
    }

}
