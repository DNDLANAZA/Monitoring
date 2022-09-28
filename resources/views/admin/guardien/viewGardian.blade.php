
@extends('admin.app')

@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Guardians')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> View Guardian {{ $guardian->name }} </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="site" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $guardian->name }}" disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="site" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $guardian->phone }}" disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" id="date" name="payment_date" value="{{ $guardian->payment_date }}" disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="site" class="form-label">Site</label>
                            <input type="text" class="form-control" name="site" value="{{ $guardian->site }}" disabled/>
                        </div>

                        <a class="btn bg-gradient-dark mb-0" href=" {{ route('guardian.index') }} ">Return</a>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

