@extends('layouts.mail')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                Dear {{($you->yfname .' '. $you->ylname)}}, 

                <p class="lead" style="font-style: italic">Thank you, <strong>{{($you->yfname .' '. $you->ylname)}}</strong> for referring your friend/family member <strrong>{{($you->ffname .' '. $you->flname)}} </strrong> to <strong>{{($you->bname)}}</strong></p>

                <p class="mt-3">
                    <h2 class="text-uppercase">Marketplace Business Referral</h2>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
