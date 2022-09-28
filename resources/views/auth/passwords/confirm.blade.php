@extends('connexion.appemail')

@section('content')

<div class="card-header text-center pt-4">
    <h5>{{ __('Confirm Password') }}</h5>
  </div>
  <div class="card-body">

    {{ __('Please confirm your password before continuing.') }}

    <form role="form text-left" method="POST" action="{{ route('password.confirm') }}">
        @csrf

      <div class="mb-3">
        <input placeholder="Password" aria-label="Password" aria-describedby="password-addon" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="text-center">
        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
            {{ __('Confirm Password') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
      </div>
    </form>
</div>

@endsection
