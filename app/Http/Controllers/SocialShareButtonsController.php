<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Share;

class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
        {
            $socialComponent = Share::page( '/', 'Share')
                ->facebook()
                ->whatsapp()
                ->twitter()
                ->telegram()
                ->linkedin();
            
            return view('welcome', compact('socialComponent'));
        }
}
