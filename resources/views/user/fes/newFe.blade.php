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
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> Add New site </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="{{ route('fes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="first-name-column">Site ID</label>
                            <input type="text" id="first-name-column" class="form-control" placeholder="MCMXXXX-YYYY" name="site_id" required>
                        </div>

                        <div class="mb-2">
                            <label for="last-name-column">DT</label>
                            <input type="file" id="last-name-column" class="form-control" name="DT" accept=".kml" required>
                        </div>

                        <div class="mb-2">
                            <label for="city-column">SSV-2G</label>
                            <input type="file" id="city-column" class="form-control" placeholder="City" name="SSV2G" accept=".pdf, .xls," required>
                        </div>

                        <div class="mb-2">
                            <label for="country-floating">SSV-3G</label>
                            <input type="file" id="country-floating" class="form-control" name="SSV3G" accept=".pdf, .xls," required>
                        </div> <br>

                        <div class="mb-2">
                            <label for="company-column">Picture</label>
                            <input type="file" id="company-column" class="form-control" name="picture" required accept=".jpg, .jpeg, .png">
                        </div>

                        <button type="submit" class="btn bg-gradient-success mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp; Save </button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

