@extends('user.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Fe')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-pencil text-info" aria-hidden="true"></i> Edit Site </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="{{ route('fes.update', $fes->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label for="first-name-column">Site ID</label>
                            <input type="text" id="first-name-column" class="form-control" placeholder="MCMXXXX-YYYY" name="site_id" value="{{ $fes->site_id }} ">
                        </div>

                        <div class="mb-2">
                            <label for="DT">DT</label>
                            <input type="text" class="form-control" value="{{ $fes->DT }}" disabled>
                            <input type="file" class="form-control" name="DT" accept=".kml">
                        </div>

                        <div class="mb-2">
                            <label for="SSV-2G">SSV-2G</label>
                            <input type="text" class="form-control" value="{{ $fes->SSV2G }}" disabled>
                            <input type="file" class="form-control" name="SSV2G" accept=".pdf, .xls,">
                        </div>

                        <div class="mb-2">
                            <label for="SSV-3G">SSV-3G</label>
                            <input type="text" class="form-control" value="{{ $fes->SSV3G }}" disabled>
                            <input type="file" class="form-control" name="SSV3G" accept=".pdf, .xls,">
                        </div>

                        <div class="mb-2">
                            <label for="company-column">Picture</label>
                            <img src="{{ asset('Sites/'.$fes->site_id.'/'.$fes->picture)}}" width="10%" height="10%" class="rounded-circle mb-1">
                            <input type="file" id="company-column" class="form-control" name="picture" accept=".jpg, .jpeg, .png">
                        </div>

                        <button type="submit" class="btn bg-gradient-success mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp; Update </button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

