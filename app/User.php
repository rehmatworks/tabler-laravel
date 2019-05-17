<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'mobile', 'bio'
    ];

    protected $appends = [
        'role', 'registered', 'avatarurl'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarurlAttribute()
    {
        if($this->avatar && Storage::disk('public')->exists($this->avatar))
        {
            return Storage::url($this->avatar);
        }
        return asset('assets/images/avatar.svg');
    }

    public function getRoleAttribute()
    {
        $role = $this->roles()->first();
        return $role ? $role->name : 'N/A';
    }

    public function getRegisteredAttribute()
    {
        return $this->created_at->format('F d, Y');
    }
}
