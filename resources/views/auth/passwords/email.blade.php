@extends('connexion.appemail')

@section('content')
<div class="card-header text-center pt-4">
    <h5>{{ __('Reset Password') }}</h5>
  </div>
  <div class="card-body">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form role="form text-left" method="POST" action="{{ route('password.email') }}">
        @csrf

      <div class="mb-3">
        <input placeholder="Email Adress" aria-label="Email" aria-describedby="email-addon" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="text-center">
        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
            {{ __('Send Password Reset Link') }}
        </button>
      </div>
    </form>
</div>

@endsection
