@extends('admin.app')

@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'LeaveCode')

    <div class="container-fluid py-4">
        <div class="col-6 mt-5">
            <a class="btn bg-gradient-dark mb-0" href=" {{ route('home') }} "><i class="fas fa-plus"></i>&nbsp;&nbsp;Return</a>
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
                        <th class="text-center">Leave_Code</th>
                        <th class="text-center">Teams</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>

                    @foreach ($maintenances as $maintenance)
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-secondary font-weight-bold"> {{ $maintenance->leave_code }} </span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary font-weight-bold"> {{ $maintenance->team->team_leader }} </span>
                            </td>
                        </tr>
                     @endforeach

                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
