@extends('connexion.appregister')

@section('content')

<div class="card-header text-center pt-4">
    <h5>Create New User</h5>
  </div>
  <div class="card-body">
    <form role="form text-left" method="POST" action="{{ route('register') }}">
        @csrf

      <div class="mb-3">
        <input placeholder="Name" aria-label="Name" aria-describedby="email-addon" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="mb-3">
        <input placeholder="Email Adress" aria-label="Email" aria-describedby="email-addon" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
        <input placeholder="Confirm Password" aria-label="Password" aria-describedby="password-addon" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>

      <div class="form-check form-check-info text-left">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
        <label class="form-check-label" for="flexCheckDefault">
          I agree the <a href="" class="text-dark font-weight-bolder">Terms and Conditions</a>
        </label>
      </div>

      <div class="text-center">
        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">
            {{ __('Register') }}
        </button>
      </div>
      <p class="text-sm mt-3 mb-0 text-center">Back to the page <a href="{{ route('login') }}" class="text-dark font-weight-bolder">User</a></p>
    </form>
</div>
@endsection
