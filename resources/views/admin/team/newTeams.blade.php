@extends('admin.app')

@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Teams')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> Add New Teams </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action=" {{ route('teams.store') }} ">
                        @csrf
                        <div class="mb-2">
                            <label for="name" class="form-label">Teams Leaders</label>
                            <input type="text" class="form-control" id="name" name="team_leader" placeholder="name of team" required/>
                        </div>
                        <div class="mb-2">
                            <table id="dynamicAddRemove" style="width:100%;">
                                <tr class="list-item">
                                    <td>
                                        <div class="row">
                                            <div class="col-mb-3">
                                                {{-- <label for="name" class="form-label">FE</label> --}}
                                                {{-- <input type="text" class="form-control"  name="addMoreInputFields[0][name]" placeholder="FE" required/> --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        {{-- <button type="button" name="add" id="dynamic-ar" class="btn bg-gradient-info mb-0"> <i class="fa fa-plus"></i> Add Item</button> --}}
                        <button type="submit" class="btn bg-gradient-dark mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp;Save Team</button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>

@endsection
