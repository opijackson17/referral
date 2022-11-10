@extends('layouts.mail')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                Dear {{($business->bname)}}, 

                <p class="lead" style="font-style: italic"> Business {{($business->name)}} was referred by <strong>{{($business->yfname .' '. $business->ylname)}}</strong>
                    to <strong>{{($business->ffname .' '. $business->flname)}}</strong></p>

                <p class="mt-3">
                    <h2 class="text-uppercase">Marketplace Business Referral</h2>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
