@extends('admin.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Equipment')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> View Equipment {{ $equipment->name }} </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action=" {{ route('equipment.store') }} " enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="site" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name" value="{{ $equipment->name }}" disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Image</label>
                            <img src="{{ asset('Gallery/Equipement/' . $equipment->picture) }}"  width="15%" height="15%" class="rounded-circle mb-1">
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="date" value="{{ $equipment->date }}" disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Teams</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="team_id"  disabled>
                                <option value="">{{ $equipment->team->team_leader }}</option>
                            </select>
                        </div> <br>
                        {{-- <button type="button" name="add" id="dynamic-ar" class="btn bg-gradient-info mb-0"> <i class="fa fa-plus"></i> Add Item</button> --}}
                        <a class="btn bg-gradient-dark mb-0" href=" {{ route('equipment.index') }} ">Return</a>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

