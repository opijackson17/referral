<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class You extends Model
{
    use HasFactory;

    protected $fillable = ['yfname', 'ylname', 'yemail', 'ymobile'];

    public static function validateYouObject($request)
    {
        return \Validator::make($request->all(),[
            'yfname' => 'required|string|max:50|min:2',
            'ylname' => 'required|string|max:50|min:2',
            'yaddress' => 'nullable|string|max:50',
            'yemail' => 'required|email',
            'ymobile' => 'required|max:13|string|min:10',
            'bname' => 'required|string|max:50|min:2',
            'baddress' => 'required|string|max:50',
            'bwebsite' => 'nullable|url',
            'bemail' => 'nullable|email',
            'bmobile' => 'required|max:13|string|min:10',
            'ffname' => 'required|string|max:50|min:2',
            'flname' => 'required|string|max:50|min:2',
            'faddress' => 'nullable|string|max:50',
            'femail' => 'required|email',
            'fmobile' => 'required|max:13|string|min:10',
        ]);
    }

    public static function saveYouObject($request)
    {
        return \DB::transaction(function() use(&$request){
            $you_id = self::create($request->only('yfname', 'ylname', 'yaddress', 'yemail', 'ymobile'))->id;

            $business = $request->only('bname', 'baddress', 'bwebsite', 'bemail', 'bmobile');
            $business['you_id'] = $you_id;
            Business::create($business);

            $friend = $request->only('ffname', 'flname', 'faddress', 'femail', 'fmobile');
            $friend['you_id'] = $you_id;
            Friend::create($friend);

            return $you_id;
        });
    }

    public static function getCurrentSavedSubmission()
    {
        return self::join('friends', 'friends.you_id', '=', 'yous.id')->join('businesses', 'businesses.you_id', '=', 'yous.id')->where('yous.id', self::latestItem()->id)->select('yous.yfname', 'yous.yemail','yous.ylname', 'businesses.bname', 'friends.ffname', 'friends.flname')->first();
    }

    public static function latestItem()
    {
        return self::latest('id')->first();
    }
}
