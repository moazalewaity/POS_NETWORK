@extends('layouts.dashboard.app')

@section('content')

<div class="row padd-30">
                <div class="col col-lg-12 col-sm-12 col-12">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3> الاعدادات  </h3>
                            </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.settings.store') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')

                    @php
                        $social_sites = ['facebook', 'google'];
                    @endphp

                    @foreach ($social_sites as $social_site)

                        {{--client id--}}
                        <div class="form-group">
                            <label class="text-capitalize">{{ $social_site }} client id</label>
                            <input type="text" name="{{ $social_site }}_client_id" class="form-control" value="{{ setting($social_site . '_client_id') }}">
                        </div>

                        {{--client secret--}}
                        <div class="form-group">
                            <label class="text-capitalize">{{ $social_site }} client secret</label>
                            <input type="text" name="{{ $social_site }}_client_secret" class="form-control" value="{{ setting($social_site . '_client_secret') }}">
                        </div>

                        {{--redirect url--}}
                        <div class="form-group">
                            <label class="text-capitalize">{{ $social_site }} redirect url</label>
                            <input type="text" name="{{ $social_site }}_redirect_url" class="form-control" value="{{ setting($social_site . '_redirect_url') }}">
                        </div>

                    @endforeach

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection