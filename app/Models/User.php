<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /*
    * Task: {
    *  id: int,
    *  name: string,
    *  created_at: date,
    *  updated_at: date,
    *  }
    */

    protected $fillable = [
        'name',
    ];

    public static function CreateUser($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->save();
        return $user->id;
    }

    public static function GetUserId($request)
    {
        $user = User::where('name', $request->name)->first();
        return $user->id;
    }

    public static function GetUserIdFromName($name)
    {
        $user = User::where('name', $name)->first();
        return $user->id;
    }

    public static function GetUserNameFromId($id)
    {
        $user = User::where('id', $id)->first();
        return $user->name;
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function friends()
    {
        return $this->hasMany(Friend::class);
    }
}
