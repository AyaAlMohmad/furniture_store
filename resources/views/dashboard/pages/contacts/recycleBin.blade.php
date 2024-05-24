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
                                                    <a href="{{ route('contacts.restore', $data->id) }}">
                                                        <i class="ace-icon fa fa-undo bigger-120"> </i>
                                                    </a>
                                                    <a style="color:red"
                                                        href="{{ route('contacts.finaldelete', $data->id) }}">
                                                        <i class="ace-icon dripicons-trash bigger-120"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                          
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        @endsection
