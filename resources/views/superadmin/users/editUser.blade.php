@extends('superadmin.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Change Information Of User')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-pencil text-info" aria-hidden="true"></i> Edit User </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="{{  route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif
                        <div class="mb-2">
                            <label for="site" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name" value="{{ $user->name }}" required/>
                        </div>

                        <div class="mb-2">
                            <label for="site" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="email" value="{{ $user->email }}" required/>
                        </div>

                        <button type="submit" class="btn bg-gradient-success mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp; Update </button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>

@endsection

