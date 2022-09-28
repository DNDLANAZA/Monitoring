@extends('admin.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Maintenance')

    <div class="container-fluid py-4">
        <div class="col-6 mt-5">
            <a class="btn bg-gradient-dark mb-0" href=" {{ route('maintenance.index') }} ">Return</a>
        </div>
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-plus text-info" aria-hidden="true"></i> View Maintenance {{ $maintenance->site }} </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="#" enctype="multipart/form-data">

                        <div class="mb-2">
                            <label for="site" class="form-label">Name of site</label>
                            <input type="text" class="form-control" name="site" value=" {{ $maintenance->site }} " disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Reference</label>
                            <input type="text" class="form-control" id="reference" name="reference" value=" {{ $maintenance->reference }} " disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Image</label>
                            <img src="{{ asset('Gallery/Maintenance/' . $maintenance->image) }}" width="15%" height="15%" class="rounded-circle mb-1">
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Teams</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="team_id" disabled>
                                <option value="">{{ $maintenance->team->team_leader }}</option>
                            </select>
                        </div> <br>

                        <div class="mb-2">
                            <label for="site" class="form-label">Status</label>
                            <input type="text" class="form-control" name="site" value=" {{ $maintenance->status }} " disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Date</label>
                            <input type="text" class="form-control" id="date" name="date" value="{{ $maintenance->date }}" disabled/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label"> What is your diagnostic? </label>
                            <textarea class="form-control" name="diagnostique" disabled>{{ $maintenance->diagnostique }}</textarea>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label"> What are the actions taken? </label>
                            <textarea class="form-control" name="action" placeholder="Type your action" disabled>{{ $maintenance->action }}</textarea>
                        </div>

                        <div class="mb-2">
                            <label for="observation" class="form-label"> What are your observations? </label>
                            <select class="form-select" id="observation" name="observation" disabled>
                                <option selected>{{ $maintenance->observation }}</option>
                            </select>
                        </div>

                        <div class="mb-2" id="box-comment">
                            <label for="reference" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" disabled>{{ $maintenance->comment }}</textarea>
                        </div>

                        {{-- <button type="button" name="add" id="dynamic-ar" class="btn bg-gradient-info mb-0"> <i class="fa fa-plus"></i> Add Item</button> --}}
                        {{-- <button type="submit" class="btn bg-gradient-success mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp;Save</button> --}}
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>

@endsection

