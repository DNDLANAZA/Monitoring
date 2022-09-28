@extends('superadmin.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'New User')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> Add New User </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="site" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name" value="{{ isset($user) ? $user->name : '' }}" required/>
                        </div>

                        <div class="mb-2">
                            <label for="site" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="email" value="{{ isset($user) ? $user->email : '' }}" required/>
                        </div>


                        <div class="mb-2">
                            <input placeholder="Password" aria-label="Password" aria-describedby="password-addon" id="password" type="password" class="form-control" value="{{ isset($user) ? $user->password : '' }}" name="password" required autocomplete="new-password">
                        </div>

                        <div class="mb-2">
                            <input placeholder="Confirm Password" aria-label="Password" aria-describedby="password-addon" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <br>
                        <button type="submit" class="btn bg-gradient-success mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp; Save </button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

