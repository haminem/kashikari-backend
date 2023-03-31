<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class User extends Model
{
    use HasFactory;

    /*
    * Task: {
    *  id: int,
    *  name: string,
    *  password: string,
    *  follow_code: string,
    *  created_at: date,
    *  }
    */

    protected $fillable = [
        'name',
    ];

    const UPDATED_AT = null;

    public static function signIn($request)
    {
        $user = User::where('name', $request->name)
            ->where('password', $request->password)
            ->first();
        if ($user) {
            return $result = [
                'error' => '',
                'user_id' => $user->id,
            ];
        } else {
            return $result = [
                'error' => 'ユーザー名またはパスワードが間違っています！',
                'user_id' => '',
            ];
        }
    }

    public static function signUp($request)
    {
        $user = User::where('name', $request->name)
            ->first();
        if ($user) {
            return $result = [
                'error' => 'このユーザー名は既に使われています！',
                'user_id' => '',
            ];
        } else {
            do {
                $follow_code = Str::random(8);
            } while (User::where('follow_code', $follow_code)->exists());

            $user = new User();
            $user->name = $request->name;
            $user->password = $request->password;
            $user->follow_code = $follow_code;
            $user->save();
            return $result = [
                'error' => '',
                'user_id' => $user->id,
            ];
        }
    }

    public static function GetUser($request)
    {
        $user = User::select('id', 'name', 'follow_code')
            ->where('id', $request->userId)
            ->first();
        return $user;
    }

    public function friends()
    {
        return $this->hasMany(Friend::class);
    }
}
