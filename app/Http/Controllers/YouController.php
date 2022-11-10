<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\YouMail;
use App\Mail\FriendMail;
use App\Mail\BusinessMail;
use App\Models\{You, Business, Friend, User};
use App\Http\Controllers\SocialShareButtonsController;

class YouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if(You::validateYouObject($request)->fails()){
            return back()->withErrors(You::validateYouObject($request));
        }   
        else{
            You::saveYouObject($request);
            Mail::to(You::getCurrentSavedSubmission()->yemail)->send(new YouMail(You::getCurrentSavedSubmission()));
            Mail::to(You::getCurrentSavedSubmission()->femail)->send(new FriendMail(You::getCurrentSavedSubmission()));
            Mail::to(You::getCurrentSavedSubmission()->bemail)->send(new BusinessMail(You::getCurrentSavedSubmission()));

            return (new SocialShareButtonsController)->ShareWidget();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\You  $you
     * @return \Illuminate\Http\Response
     */
    public function show(You $you)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\You  $you
     * @return \Illuminate\Http\Response
     */
    public function edit(You $you)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateYouRequest  $request
     * @param  \App\Models\You  $you
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYouRequest $request, You $you)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\You  $you
     * @return \Illuminate\Http\Response
     */
    public function destroy(You $you)
    {
        //
    }
}
