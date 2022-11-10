<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Referrals</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Script -->
        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="icon" href="{{ URL::asset('/images/favicon.ico') }}" type="image/x-icon"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <style type="text/css">
            div#social-links {
                margin: 0 auto;
                max-width: 500px;
            }
            div#social-links ul li {
                display: inline-block;
            }          
            div#social-links ul li a {
                padding: 15px;
                border: 1px solid #ccc;
                margin: 1px;
                font-size: 30px;
                color: #332D2D;
                background-color: #ccc;
            }
            .form-control {
                border-radius: 0px;
            }
        </style>
    </head>
    <body>
        <div class="py-3">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mx-auto mt-4">
                        <h1 class="text-uppercase text-muted text-center">
                            Marketplace Business referral
                        </h1>
                    </div>
                    <div class="mx-auto col-sm-8">
                        <img src="{{ asset('#')}}" class="img-fluid mx-auto d-block" alt="Referral">
                    </div>
                    <div class="mx-auto col-sm-8">
                        <p class="lead display-5 mb-4"><strong>Our businesses have grown over the times from all the great clients. Let's refer our friends, family members and neighbours to grow our business clientele.</strong></p>
                        <div class="mt-4 shadow-sm p-2 bg-white rounded text-center">
                            <p class="text-uppercase" style="font-family: times new romans, helvetica; font-size: 30px;"><strong>Friends Refer <span class="">friends</span></strong></p>
                            <p class="text-small text-muted">
                                Would you like to recommend business to friends who might also refer it to their friends?
                            </p>
                               @if ($errors->any())
                                <div class="alert alert-danger">
                                  <ul class="list-style-none">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach

                                  </ul>
                                </div>
                                @endif
                            <div class="w-50 mx-auto mb-4">
                                <button type="button" class="btn btn-info btn-lg text-uppercase font-weight-bold mt-2 mx-auto rounded-pill" data-toggle="modal" data-target="#exampleModalLong">Refer</button>
                            </div>

                            <!-- modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title text-uppercase text-left font-weight-bold" id="exampleModalLongTitle">Refer A Friend</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                        <form action="{{ route('refer') }}" method="post">
                                        @csrf
                                        <div class="row mx-1 mx-auto">
                                            <div class="col-sm-6">
                                                <p>Your Info.</p> 
                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <input id="yfname" type="text" class="form-control @error('yfname') is-invalid @enderror" name="yfname" value="{{ old('yfname') }}" required placeholder="{{ __('First name') }}">
                                                        @error('yfname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>       
                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <input id="ylname" type="text" class="form-control @error('ylname') is-invalid @enderror" name="ylname" value="{{ old('ylname') }}" required placeholder="{{ __('Last name') }}">

                                                        @error('ylname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <input id="yemail" type="yemail" class="form-control @error('yemail') is-invalid @enderror" name="yemail" value="{{ old('yemail') }}" required placeholder="{{ __('Email Address') }}">

                                                        @error('yemail')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>                                                

                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <input id="ymobile" type="tel" class="form-control @error('ymobile') is-invalid @enderror" name="ymobile" value="{{ old('ymobile') }}" required placeholder="{{ __('Mobile Number') }}">

                                                        @error('ymobile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <p>Friend's Info.</p>
                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <input id="ffname" type="text" class="form-control @error('ffname') is-invalid @enderror" name="ffname" value="{{ old('ffname') }}" required placeholder="{{ __('First name') }}">

                                                        @error('ffname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>       
                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <input id="flname" type="text" class="form-control @error('flname') is-invalid @enderror" name="flname" value="{{ old('flname') }}" required placeholder="{{ __('Last name') }}">

                                                        @error('flname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <input id="femail" type="femail" class="form-control @error('femail') is-invalid @enderror" name="femail" value="{{ old('femail') }}" required placeholder="{{ __('Email Address') }}">

                                                        @error('femail')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>                                                

                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <input id="fmobile" type="tel" class="form-control @error('fmobile') is-invalid @enderror" name="fmobile" value="{{ old('fmobile') }}" required placeholder="{{ __('Mobile Number') }}">

                                                        @error('fmobile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="col-sm-12">
                                            <p>Business Info.</p>

                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <input id="bname" type="text" class="form-control @error('bname') is-invalid @enderror" name="bname" value="{{ old('bname') }}" required placeholder="{{ __('Business Name') }}">

                                                    @error('bname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-4">
                                                    <input id="bwebsite" type="url" class="form-control @error('bwebsite') is-invalid @enderror" name="bwebsite" value="{{ old('bwebsite') }}" required placeholder="{{ __('Business Website') }}">

                                                    @error('bwebsite')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-4">
                                                    <input id="bemail" type="email" class="form-control @error('bemail') is-invalid @enderror" name="bemail" value="{{ old('bemail') }}" required placeholder="{{ __('Business Email') }}">

                                                    @error('bemail')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <input id="baddress" type="text" class="form-control @error('baddress') is-invalid @enderror" name="baddress" value="{{ old('baddress') }}" required placeholder="{{ __('Business Address') }}">

                                                        @error('baddress')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input id="bmobile" type="tel" class="form-control @error('bmobile') is-invalid @enderror" name="bmobile" value="{{ old('bmobile') }}" required placeholder="{{ __('Business Mobile Number') }}">

                                                        @error('bmobile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                              
                                                </div>
                                            </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Refer</button>
                                              </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 text-center"> 
                    <div class="mx-auto col-sm-8 shadow-lg p-3 mb-5 bg-white rounded">
                        @yield('content')
                    </div>
                </div>
            </div>

            <div class="row mt-4 mb-0">
                <div class="bg-white w-50 mx-auto">
                    {!! $socialComponent !!}
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>