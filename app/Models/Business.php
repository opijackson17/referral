<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Business extends Model
{
    use HasFactory;

    public $fillable = ['you_id', 'bname', 'baddress', 'bwebsite', 'bemail', 'bmobile', 'feedback'];

    public function getBusiness($id)
    {
        return self::findorfail($id)->first();
    }

    public static function validateBusinessFeedBack($request)
    {
        return \Validator::make($request->only('feedback', 'id'), [
            'id' => 'required|string|max:5|min:1',
            'feedback' => 'required|string|max:500'
        ]);
    }

    public static function updateBusinessReferralStatus($request)
    {

        if(self::validateBusinessFeedBack($request)->fails()){
            return response()->json(['errors'=>self::validateBusinessFeedBack($request)->errors()->all()]);
        }else{
            self::whereId($request->id)->update($request->only('feedback'));
            return response()->json(['status'=>300]);
        }
    }

    public static function getBusinessReferral()
    {
        return self::join('yous', 'yous.id', '=', 'businesses.you_id')->join('friends', 'friends.you_id', '=', 'businesses.you_id')->select('businesses.*', 'yous.*', 'friends.*', 'businesses.created_at as created_date')->get();
    }

    public static function timeSeriesGraph()
    {
        return DB::table('businesses')->select(
                            DB::raw('count(*) as feedback_count'), DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as month_year"))
                            ->whereNotNull('feedback')
                            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
                            ->get();
        }
}
