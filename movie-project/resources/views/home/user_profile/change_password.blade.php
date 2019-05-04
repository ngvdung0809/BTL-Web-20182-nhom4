@extends('home.layout')
@section('title', 'User Profile')
@section('css')
@endsection
@section('search')
@endsection
@section('content')
    @include('home.user_profile.header', ['pageHeader'=>$user->name, 'pageNow'=>'Change PassWord'])
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                @include('home.user_profile.side_bar', ['path'=>'/storage/'.$user->image])
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="form-style-1 user-pro">
                        <form class="password" method="post" action="{{ route('home_user_profile_update_change_password', ['id'=>$user->id]) }}">
                            @csrf
                            <h4 style="text-align: center">Change password</h4>
                            <div class="row">
                                <div class="form-it{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label>Current Password</label>
                                    <input id="current-password" type="password" class="form-it" name="current-password" placeholder="Enter current password" required>

                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-it{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <label>New Password</label>
                                    <input id="new-password" type="password" class="form-it" name="new-password" placeholder="Enter new password" required>

                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-it">
                                    <label>Confirm New Password</label>
                                    <input id="new-password-confirm" type="password" class="form-it" name="new-password_confirmation" placeholder="Enter confirm password" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 form-it">
                                    <input class="submit" type="submit" value="Change Password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/home/user_profile/change_password.js') }}"></script>
@endsection
