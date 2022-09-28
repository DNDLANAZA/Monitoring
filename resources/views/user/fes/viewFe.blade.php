@extends('user.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Fe')

    <div class="container-fluid py-4">
        <div class="col-6 mt-5">
            <a class="btn bg-gradient-dark mb-0" href=" {{ route('fes.index') }} ">Return</a>
        </div>
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> View Site {{ $fes->site_id }} </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="#" enctype="multipart/form-data">

                        <div class="mb-2">
                            <label for="first-name-column">Site ID</label>
                            <input type="text" class="form-control" placeholder="MCMXXXX-YYYY" value="{{ $fes->site_id }}" disabled>
                        </div>

                        <div class="mb-2">
                            <label for="last-name-column">DT</label>
                            <input type="text" class="form-control" value="{{ $fes->DT }}" disabled>
                        </div>

                        <div class="mb-2">
                            <label for="city-column">SSV-2G</label>
                            <input type="text" class="form-control" value="{{ $fes->SSV2G }}" disabled>
                        </div>

                        <div class="mb-2">
                            <label for="country-floating">SSV-3G</label>
                            <input type="text" class="form-control"  value="{{ $fes->SSV3G }}" disabled>
                        </div>

                        <div class="mb-2">
                            <label for="company-column">Picture</label>
                            <img src="{{ asset('Sites/'.$fes->site_id.'/'.$fes->picture)}}" width="100px" height="100px" class="rounded-circle mb-1">
                        </div>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>

@endsection

