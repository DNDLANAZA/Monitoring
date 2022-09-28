@extends('admin.app')


@section('content')

    @section('Titre', 'Dashboard')

    @section('SousTitre', 'Maintenance')

    <div class="container-fluid py-4">
      <div class="row my-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6> <i class="fa fa-pencil text-info" aria-hidden="true"></i> Edit Maintenance </h6>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="datatake" role="form" action="{{ route('maintenance.update', $maintenance->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label for="site" class="form-label">Name of site</label>
                            <input type="text" class="form-control" name="site" placeholder="name of site" value="{{ $maintenance->site }}" required/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Reference</label>
                            <input type="text" class="form-control" id="reference" name="reference" value="{{ $maintenance->reference }}" placeholder="reference" required/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Image</label>
                            <img src="{{ asset('Gallery/Maintenance/' . $maintenance->image) }}" width="10%" height="10%" class="rounded-circle mb-1 "> <br>
                            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .png, .jpeg, .gif"/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Teams</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="team_id" required>
                                <option value="{{ $maintenance->team_id }}">{{ $maintenance->team->team_leader }}</option>
                                @foreach ($teams as $team)
                                 <option value=" {{ $team->id }} " > {{ $team->team_leader }}</option>
                                @endforeach
                            </select>
                        </div> <br>

                        <div class="mb-2">

                            <label for="status" class="form-label">Status: </label>

                            <div class="form-check form-check-inline">
                              <label for="status" class="form-label">Up</label>
                              <input type="checkbox" class="form-control form-check-input" id="status" name="status[]" value="Up"/>
                            </div>


                            <div class="form-check form-check-inline">
                                <label for="status" class="form-label">Down</label>
                                <input type="checkbox" class="form-control form-check-input" id="status" name="status[]" value="Down"/>
                            </div>

                            <div class="form-check form-check-inline">
                                <label for="status" class="form-label">LVD</label>
                                <input type="checkbox" class="form-control form-check-input" id="status" name="status[]" value="LVD"/>
                            </div>

                            <div class="form-check form-check-inline">
                                <label for="status" class="form-label">BLOKING</label>
                                <input type="checkbox" class="form-control form-check-input" id="status" name="status[]" value="BLOKING"/>
                            </div>

                            <div class="form-check form-check-inline">
                                <label for="status" class="form-label">CCTV</label>
                                <input type="checkbox" class="form-control form-check-input" id="status" name="status[]" value="CCTV"/>
                            </div>

                            <div class="form-check form-check-inline">
                                <label for="status" class="form-label">LINK</label>
                                <input type="checkbox" class="form-control form-check-input" id="status" name="status[]" value="LINK"/>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="date" value="{{ $maintenance->date }}" required/>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label"> What is your diagnostic? </label>
                            <textarea class="form-control" name="diagnostique" placeholder="Type your diagnostique" required>{{ $maintenance->diagnostique }}</textarea>
                        </div>

                        <div class="mb-2">
                            <label for="reference" class="form-label"> What are the actions taken? </label>
                            <textarea class="form-control" name="action" placeholder="Type your action" required>{{ $maintenance->action }}</textarea>
                        </div>

                        <div class="mb-2">
                            <label for="observation" class="form-label"> What are your observations? </label>
                            <select class="form-select" id="observation" name="observation" required>
                                <option value="{{ $maintenance->observation }}" selected>{{ $maintenance->observation }}</option>
                                <option name="resolu" value="resolu">Probleme Resolu</option>
                                <option name="non resolu" value="non resolu">Probleme Non Resolu</option>
                                <option name="standBy" value="standBy">Probleme En StandBy</option>>
                            </select>
                        </div>

                        <div class="mb-2" id="box-comment">
                            <label for="reference" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" placeholder="Type your comment">{{ $maintenance->comment }}</textarea>
                        </div>

                        {{-- <button type="button" name="add" id="dynamic-ar" class="btn bg-gradient-info mb-0"> <i class="fa fa-plus"></i> Add Item</button> --}}
                        <button type="submit" class="btn bg-gradient-success mb-0"><i class="fas fa-check"></i>&nbsp;&nbsp; Update </button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
@endsection

