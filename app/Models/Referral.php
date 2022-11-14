<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Referral extends Model
{
    use HasFactory;

    public static function getReferrals()
    {
        // dd(DB::table('yous')->join('friends', 'yous.id', '=', 'friends.you_id')->join('businesses', 'yous.id', '=', 'businesses.you_id')->select('yous.yfname', 'friends.ffname','friends.flname','yous.ylname', 'businesses.bname','businesses.feedback', 'yous.created_at as date_created', 'yous.id as y_id', 'friends.id as f_id', 'businesses.id as b_id')->get());
        return DB::table('yous')->join('friends', 'yous.id', '=', 'friends.you_id')->join('businesses', 'yous.id', '=', 'businesses.you_id')->select('yous.yfname', 'friends.ffname','friends.flname','yous.ylname', 'businesses.bname', 'yous.created_at as date_created', 'yous.id as y_id', 'friends.id as f_id', 'businesses.id as b_id')->get();
    }    

    public static function getReferralsForDownload($value)
    {
        return $value == "1" ? \DB::table('yous')->whereNotNull('businesses.feedback')->join('friends', 'yous.id', '=', 'friends.you_id')->join('businesses', 'yous.id', '=', 'businesses.you_id')->select('yous.*', 'friends.*', 'businesses.*', 'yous.created_at as date_created', 'yous.id as y_id', 'friends.id as f_id', 'businesses.id as b_id')->get()
        : 
            \DB::table('yous')->whereNull('businesses.feedback')->join('friends', 'yous.id', '=', 'friends.you_id')->join('businesses', 'yous.id', '=', 'businesses.you_id')->select('yous.*', 'friends.*', 'businesses.*', 'yous.created_at as date_created', 'yous.id as y_id', 'friends.id as f_id', 'businesses.id as b_id')->get();
    }
}
