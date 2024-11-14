@extends('layouts.superadmin')
@section('title')
    <title>Expense Add | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Add Expense</h4>
                    </div>

                    <div class="card-body">
                        @if(session('successMsg') || session('dangerMsg'))
                            <div class="alert @if(session('successMsg')) alert-success @else alert-danger @endif alert-dismissible fade show" role="alert">
                                {{ session('successMsg') ?? session('dangerMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{ route('expense.store') }}">
                            @csrf
                        <fieldset class="col-lg-12 border p-3 mb-3">
                            <div class="form-row">
                                <div class="col-md-4 mb-6">
                                    <label for="validationServer013">Date</label>
                                    <span class="bmd-form-group"><div class="input-group date">
                          <input class="form-control" type="date" name="daTe" required>

                      </div></span>
                                </div>

                                <div class="col-md-4 mb-6">
                                    <label for="validationServer013">Title</label>
                                    <span class="bmd-form-group">
                                        <input type="text" name="title" class="form-control" required>
                                    </span>
                                </div>

                                <div class="col-md-4 mb-6">
                                    <label for="validationServer013">Value</label>
                                    <span class="bmd-form-group">
                                        <input type="text" name="amount" class="form-control" required>
                                    </span>
                                </div>




                            </div>
                        </fieldset>

                        <div class="form-group col-lg-12 text-center"><button name="" type="submit" class="btn btn-primary"><span>Submit</span></button></div>
                        </form>
                    </div>

                </div>
            </div>







        </div>
    </div>

@endsection