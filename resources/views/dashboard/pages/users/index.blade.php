@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="tab-content padding-4">

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>{{ __('dashboard.username') }}</th>

                                    <th>{{ __('dashboard.email') }}</th>
                                    <th>{{ __('dashboard.mobile') }}</th>
                                    <th>{{ __('dashboard.gender') }}</th>
                                    <th>{{ __('dashboard.actions') }}</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($items as $user)
                                       <tr>
                                                <td>{{ $user->name }}</td>

                                                <td>
                                                    <a href='mailto: {{ $user->email }}'>{{ $user->email }}</a>
                                                </td>
                                                <td><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a> </td>
                                                <td>{{ $user->gender }}</td>

                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons" style="display:flex;">
                                                        <div>
                                                            <a style="color:green"
                                                                href="{{ route('users.edit', $user->id) }}">
                                                                <i class="fas fa-feather bigger-120"
                                                                    style="margin-right: 10px;">
                                                                </i>
                                                            </a>
                                                            <a style="color:blue" href="{{ route('users.show', $user->id) }}">
                                                                <i class="dripicons-zoom-in bigger-120"
                                                                    style="margin-right: 10px;"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <form method="POST"
                                                                action="{{ route('users.destroy', $user->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button style="border: none; color:white;">
                                                                    <i class="ace-icon dripicons-trash bigger-120"
                                                                        style="color: red;"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                       
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <!-- end row -->
@endsection
