<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function tintuc()
    {
        return $this->hasMany('App\TinTuc', 'idUser', 'id');
    }

    public static function saveUser($request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($request->has('levle')) {
          $user->levle = $request->levle;
        } else {
          $user->levle = 0;
        }
        $user->save();
    }

    public static function updateUser($request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->levle = $request->levle;
        $user->save();
    }

    public static function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
