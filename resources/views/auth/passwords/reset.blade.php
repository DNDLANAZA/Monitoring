@extends('connexion.appemail')

@section('content')
<div class="card-header text-center pt-4">
    <h5>{{ __('Reset Password') }}</h5>
  </div>
  <div class="card-body">

    <form role="form text-left" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

      <div class="mb-3">
        <input placeholder="Email Adress" aria-label="Email" aria-describedby="email-addon" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="mb-3">
        <input placeholder="Password" aria-label="Password" aria-describedby="password-addon" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="mb-3">
        <input placeholder="Confirm Password" aria-label="Confirm-Password" aria-describedby="confirm-password-addon" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>

      <div class="text-center">
        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
            {{ __('Reset Password') }}
        </button>
      </div>
    </form>
</div>
@endsection
