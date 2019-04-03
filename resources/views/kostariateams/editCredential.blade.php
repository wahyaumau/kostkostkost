@extends('layouts.app_backup')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>
        <div class="card-body">
          <form method="POST" action="{{ route('kostariateams.updateCredential', $kostariateam) }}">
            @csrf            
            @method('PATCH')
            <div class="form-group row">
              <label for="currentemail" class="col-md-4 col-form-label text-md-right">{{ __('Current E-Mail') }}</label>
              <div class="col-md-6">
                <input id="currentemail" type="currentemail" class="form-control{{ $errors->has('currentemail') ? ' is-invalid' : '' }}" name="currentemail" value="{{ $kostariateam->email }}" disabled="true">
                @if ($errors->has('currentemail'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('currentemail') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('New E-Mail') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="currentPassword" class="col-md-4 col-form-label text-md-right">{{ __('Enter Your Current Password') }}</label>
              <div class="col-md-6">
                <input id="currentPassword" type="password" class="form-control{{ $errors->has('currentPassword') ? ' is-invalid' : '' }}" name="currentPassword" required>
                @if ($errors->has('currentPassword'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('currentPassword') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>            
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                  {{ __('Submit') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection