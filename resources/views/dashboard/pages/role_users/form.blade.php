@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('role_users.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="widget-main">

                            @foreach ($items as $item)
                          
                            <div class="form-group">
                                <label  > {{ __('dashboard.username') }}:  </label> 
                               
                                <input   name="user_id" type="hidden" value="{{ $item->id }}">
                                {{ $item->name }}
                            </div>
                            <div class="form-group">
                                <label for="role_id">
                                    @lang('dashboard.role'):
                                </label>
                                @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="role_id[]"
                                            id="role_{{ $role->id }}" value="{{ $role->id }}">
                                        <label class="form-check-label" for="role_{{ $role->id }}">
                                            {{ $role->role_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="dropdown-divider"></div>

                            @endforeach
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
