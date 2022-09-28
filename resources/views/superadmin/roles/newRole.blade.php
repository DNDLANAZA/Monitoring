@extends('superadmin.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'New Role')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> Add New Role </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="name">NAME</label>
                            <input type="text" id="name" class="form-control" placeholder="Name of role" name="name" required>
                        </div>
                        <button type="submit" class="btn bg-gradient-success mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp; Save </button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

