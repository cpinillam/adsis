<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'group', 'document', 'description'
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
    
    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function GetAllUsers()
    {
        $allUsers = User::all();
        return $allUsers;
    }

    public function GetUsersByGroup(int $group_id)
    {
        $users = $this->GetAllUsers()->where('group', $group_id);
        return $users;
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }

    public function setGroup($group, $id)
    {
        $setUserGroup=DB::table('users')
            ->where('id', $id)
            ->update(['group' => $group]);
        return true;
    } 
}


