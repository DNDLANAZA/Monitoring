@extends('superadmin.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Role Of User')

    <div class="container-fluid py-4">
        <div class="col-6 mt-5">
            <a class="btn bg-gradient-dark mb-0" href=" {{ route('rus.index') }} ">Return</a>
        </div>
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> View Role Of User {{ $rus->id }} </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="#" enctype="multipart/form-data">

                        <div class="mb-2">
                            <label for="id">User ID</label>
                            <input type="text" class="form-control" value="{{ $rus->user_id }}" disabled>
                        </div>

                        <div class="mb-2">
                            <label for="id">Role ID</label>
                            <input type="text" class="form-control" value="{{ $rus->role_id }}" disabled>
                        </div>

                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>

@endsection

