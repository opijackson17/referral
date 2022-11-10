@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
           <ul class="nav justify-content-center text-uppercase mx-auto mt-2">
              <li class="nav-item">
                <a class="nav-link text-decoration-none text-dark" href="{{ route('user') }}">Manage Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('allReferrals') }}">Referrals</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('downloadFile') }}">Download Referrals</a>
              </li>
            </ul>
        </div>

        <div class="col-sm-12 mx-auto py-2">
            @yield('admin')
        </div>
    </div>
</div>
@endsection
