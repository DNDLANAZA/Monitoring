
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
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> {{ isset($guardian) ? 'Edit Guardian' : 'Add New Guardian' }} </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="{{ isset($guardian) ? route('guardian.update', $guardian->id) : route('guardian.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (isset($guardian))
                            @method('PUT')
                        @endif
                        <div class="mb-2">
                            <label for="site" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name of site" value="{{ isset($guardian) ? $guardian->name : '' }}" required/>
                        </div>

                        <div class="mb-2">
                            <label for="site" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ isset($guardian) ? $guardian->phone : '' }}" required/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" id="date" name="payment_date" placeholder="date" value="{{ isset($guardian) ? $guardian->payment_date : '' }}" required/>
                        </div>

                        <div class="mb-2">
                            <label for="site" class="form-label">Site</label>
                            <input type="text" class="form-control" name="site" placeholder="Site" value="{{ isset($guardian) ? $guardian->site : '' }}" required/>
                        </div>
                        
                        {{-- <button type="button" name="add" id="dynamic-ar" class="btn bg-gradient-info mb-0"> <i class="fa fa-plus"></i> Add Item</button> --}}
                        <button type="submit" class="btn bg-gradient-success mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp; {{ isset($guardian) ? 'Update' : 'Save' }}</button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

