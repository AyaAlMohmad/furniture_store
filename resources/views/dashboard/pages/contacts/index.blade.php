@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    
                    <div class="tab-content padding-4">
                       
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th >{{ __('dashboard.location') }}</th>
                                            <th >{{ __('dashboard.mobile') }}</th>
                                            <th >{{ __('dashboard.email') }}</th>
                                            <th >{{ __('dashboard.website') }}</th>
                                            <th >{{ __('dashboard.actions') }}</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($items as $data)
                                            <tr>
                                               <td>{{ $data->location }}</td>
                                               <td>{{ $data->phone }}</td>
                                                <td style="word-break: break-all;">{{ $data->email }}</td>
                                                <td style="word-break: break-all;">{{ $data->website }}</td>

                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons" style="display:flex;">
                                                        <a style="color:green" href="{{ route('contacts.edit', $data->id) }}">
                                                            <i class="fas fa-feather bigger-120"
                                                                style="margin-right: 10px;"> </i>
                                                        </a>
                                                        <a style="color:blue" href="{{ route('contacts.show', $data->id) }}">
                                                            <i class="dripicons-zoom-in bigger-120"
                                                                style="margin-right: 10px;"></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('contacts.destroy', $data->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="border: none; color:white;">
                                                                <i class="ace-icon dripicons-trash bigger-120"
                                                                    style="color: red;"></i>
                                                            </button>
                                                        </form>

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
