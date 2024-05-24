@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('roles.update',$item->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label> {{ __('dashboard.name') }}</label>
                            <input type="text" name="role_name" class="form-control" required placeholder="name" value="{{ $item->role_name }}" />
                        </div>

                        <div class="form-group">

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
