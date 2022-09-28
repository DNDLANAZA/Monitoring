@extends('admin.app')

@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Teams')

    <div class="container-fluid py-4">

        @if(session()->has('status'))
            <div class="alert alert-success" id="alert1">
                <h6 class="text-center"> {{ session()->get('status') }} </h6>
            </div>
        @endif

        <div class="col-6 mt-5">
            <a class="btn bg-gradient-dark mb-0" href=" {{ route('teams.create') }} "><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New team</a>
        </div>
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-list text-info" aria-hidden="true"></i> List of teams</h6>
                  </div>
                </div>
              </div>
            <table id="listtable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($teams as $team)
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-secondary font-weight-bold"> {{ $team->team_leader }} </span>
                            </td>
                            <td>
                                <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('teams.edit', $team) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#modal-delete"><i class="far fa-trash-alt me-2"></i>Delete</button>
                                {{-- <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a> --}}
                                <div class="col-md-4">
                                    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h6 class="modal-title text-white" id="modal-title-notification">Your attention is required</h6>
                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <div class="py-3 text-center">
                                                        <i class="fa fa-trash-alt ni-3x"></i>
                                                        <h4 class="text-gradient text-danger mt-4">Are you sure?</h4>
                                                        <p>You won't be able to revert this!</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-white bg-gradient-danger">Ok, Got it</button>
                                                        <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                     @endforeach

                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
        let x = document.getElementById("alert1");
        setTimeout(function(){ x.style.visibility = "hidden"; }, 2000);
    </script>

@endsection
