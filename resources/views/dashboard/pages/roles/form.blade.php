@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('roles.store') }}">
                    @csrf
                    <div class="widget-main">

                        <div class="tab-content padding-4">
                            <div class="form-group">
                                <label for="role_name">
                                    {{ __('dashboard.name') }}
                                </label>

                                <input class="form-control" required type="text"
                                    name="role_name">
                                @error( 'role_name')
                                    <div>{{ $message }}</div>
                                @enderror

                            </div><br><br>

                        </div><br><br>
                        <div class="form-group">
                            <div class="col-sm-6 control-label no-padding-right">
                                <button type="submit" class="btn btn-sm btn-primary"><i
                                        class="fa fa-save"></i>save</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
