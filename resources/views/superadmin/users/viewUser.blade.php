@extends('superadmin.app')

@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'See User')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> View User {{ $user->name }} </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action=" {{ route('users.store') }} " enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="site" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="site" class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" disabled/>
                        </div>
                        <a class="btn bg-gradient-dark mb-0" href=" {{ route('users.index') }} ">Return</a>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

