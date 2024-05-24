@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('users.update', $item->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="widget-main">
                            <div class="form-group">
                                <label> {{ __('dashboard.username') }}: </label>

                                <input class="form-control" name="name" type="text" value="{{ $item->name }}">

                            </div>
                            <div class="form-group">
                                <label> {{ __('dashboard.email') }}: </label>

                                <input class="form-control" name="email" type="text" value="{{ $item->email }}">

                            </div>
                            <div class="form-group">
                                <label> {{ __('dashboard.mobile') }}: </label>

                                <input class="form-control" name="phone" type="text" value="{{ $item->phone }}">

                            </div>
                            <div class="form-group">
                                <label> {{ __('dashboard.gender') }}: </label>
                                <select name="gender" id="designer_id">
                                    <option value="">{{ trans('dashboard.select') }} ..</option>>
                                   
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    
                                </select>
                            </div>
                            <div class="col-sm-6 control-label no-padding-right">
                                <button type="submit" class="btn btn-sm btn-primary">save</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
