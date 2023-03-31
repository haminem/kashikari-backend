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
     *  point: int,
     *  created_at: date,
     *  }
     */

    protected $fillable = [
        'user_id',
        'friend_id',
        'point'
    ];

    const UPDATED_AT = null;

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

    public static function GetFriends($request)
    {
        /**
         * friend = {
         * id: int,
         * friend_id: int,
         * friend_name: string,
         * follower_id: int,
         * created_at: date,
         * }
         */ 
        $friends = Friend::where('user_id', $request->userId)->get();
        foreach ($friends as $friend) {
            $friend->friend_name = User::where('id', $friend->friend_id)->first()->name;
            $friend->follower_id = Friend::where('user_id', $friend->friend_id)->where('friend_id', $request->userId)->first()->id;
        }
        return $friends;
    }

    public static function GetPoint($request)
    {
        $point = Friend::select('point')->where('id', $request->friendId)->first()->point;
        return $point;
    }

    public static function Follow($request)
    {
        // follow_codeをもとにfriend_idを取得
        $friend_id = User::where('follow_code', $request->followCode)->first()->id;

        $friend = new Friend();
        $friend->user_id = $request->userId;
        $friend->friend_id = $friend_id;
        $friend->point = 0;
        $friend->save();

        $friend = new Friend();
        $friend->user_id = $friend_id;
        $friend->friend_id = $request->userId;
        $friend->point = 0;
        $friend->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
