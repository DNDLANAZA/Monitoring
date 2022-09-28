@extends('superadmin.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Super Admin')

    <div class="container-fluid py-4">

        @if(session()->has('status'))
            <div class="alert alert-success" id="alert1">
                <h6 class="text-center"> {{ session()->get('status') }} </h6>
            </div>
        @endif

        <div class="col-6 mt-5">
            <a class="btn bg-gradient-dark mb-0" href=" {{ route('users.create') }} "><i class="fas fa-plus"></i>&nbsp;&nbsp;New User</a>
        </div>

      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-list text-info" aria-hidden="true"></i> List of User</h6>
                  </div>
                </div>
              </div>
            <table id="listtable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">NAME</th>
                        <th class="text-center">EMAIL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-secondary font-weight-bold"> {{ $user->name }} </span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary font-weight-bold"> {{ $user->email }} </span>
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                    <a class="btn btn-link text-warning px-3 mb-0" href=" {{ route('users.show', $user->id) }}"><i class="fas fa-eye text-warning me-2" aria-hidden="true"></i>View</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="far fa-trash-alt me-2"></i>Delete</button>
                                </form>
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
