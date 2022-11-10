<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = ['you_id', 'ffname', 'flname', 'femail', 'fmobile', 'finterest'];


    public static function validateFriendFormRequest($request)
    {
        return $request->validate([
            'ffname' => 'required|string|max:50|min:2',
            'flname' => 'required|string|max:50|min:2',
            'faddress' => 'required|string|max:50',
            'femail' => 'required|email',
            'fmobile' => 'required|max:13|string|min:10',
        ]);
    }

    public static function storeFriend($request, $you_id)
    {
        $validateFriendInputFields = $request->only('ffname', 'flname', 'faddress', 'femail', 'fmobile');
        return array_merge($validateFriendInputFields, ['you_id'=>$you_id]);
    }
}
