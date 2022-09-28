@extends('superadmin.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Edit Role Of User')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-pencil text-info" aria-hidden="true"></i> Edit Role Of User </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="{{ route('rus.update', $rus->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label for="user_id" class="form-label">User</label>
                            <select class="form-select" id="user" name="user_id" required>
                                <option value="{{ $rus->user_id }}">{{ $rus->user_id}}</option>
                                @foreach ($users as $user)
                                 <option value=" {{ $user->id }} " > {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Role</label>
                            <select class="form-select" id="role_id" name="role_id" required>
                                <option value="{{ $rus->role_id }}">{{ $rus->role_id}}</option>
                                @foreach ($roles as $role)
                                 <option value=" {{ $role->id }} " > {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn bg-gradient-success mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp; Update </button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

