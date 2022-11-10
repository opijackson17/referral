@extends('layouts.mail')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                Dear {{($friend->ffname .' '. $friend->flname)}}, 

                <p class="lead" style="font-style: italic"><strong>{{($friend->ffname .' '. $friend->flname)}}</strong> has been referred by <strong>{{($friend->yfname .' '. $friend->ylname)}}</strong>
                    to <strong>{{($friend->bname)}}</strong></p>

                <p class="mt-3">
                    <h2 class="text-uppercase">Marketplace Business Referral</h2>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
