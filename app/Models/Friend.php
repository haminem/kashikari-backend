<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    /**
     * Friend: {
     *  id: int,
     *  user_id: int,
     *  friend_id: int,
     *  created_at: date,
     *  updated_at: date,
     *  }
     */

    protected $fillable = [
        'user_id',
        'friend_id',
        'point'
    ];

    public static function CreateFriend($request)
    {
        /**
         * request = {
         *  user_id: int,
         *  friend_name: string,
         * }
         */
        $friend = new Friend();
        $friend->user_id = $request->user_id;
        $friend->friend_id = User::GetUserIdFromName($request->name);
        $friend->point = 0;
        $friend->save();

        $friend = new Friend();
        $friend->user_id = User::GetUserIdFromName($request->name);
        $friend->friend_id = $request->user_id;
        $friend->point = 0;
        $friend->save();
    }

    public static function GetFriend($request)
    {
        /**
         * friends = {
         * id: int,
         * friend_id: int,
         * friend_name: string,
         * updated_at: date,
         * }
         */ 
        $friends = Friend::select('id', 'friend_id', 'updated_at')->where('user_id', $request->user_id)->get();
        foreach ($friends as $friend) {
            $friend->friend_name = User::GetUserNameFromId($friend->friend_id);
        }
        return $friends;
    }

    public static function GetPoint($request)
    {
        $friend = Friend::where('user_id', $request->user_id)->where('friend_id', User::GetUserIdFromName($request->friend_name))->first();
        return $friend->point;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
