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
                                            <th >{{ __('dashboard.image') }}</th>
                                            <th >{{ __('dashboard.video') }}</th>
                                            <th >{{ __('dashboard.actions') }}</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($images as $data)
                                            <tr>
                                                <td><img style="width: 90px; height: 90px;"
                                                        src="{{ asset('images/slider/' . $data->image) }}"></td>
                                                <td>--</td>
                                                
                                                <td>
                                                    <a href="{{ route('image.restore', $data->id) }}">
                                                        <i class="ace-icon fa fa-undo bigger-120"> </i>
                                                    </a>
                                                    <a style="color:red"
                                                        href="{{ route('image.finaldelete', $data->id) }}">
                                                        <i class="ace-icon dripicons-trash bigger-120"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($videos as $data)
                                        <tr>
                                            <td>--</td>
                                            <td><video style="width: 90px; height: 90px;"
                                                    src="{{ asset('videos/slider/' . $data->video) }}"></video></td>
                                           
                                            
                                                    <td>
                                                        <a href="{{ route('video.restore', $data->id) }}">
                                                            <i class="ace-icon fa fa-undo bigger-120"> </i>
                                                        </a>
                                                        <a style="color:red"
                                                            href="{{ route('video.finaldelete', $data->id) }}">
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
        </div>
    </div>
    
            <!-- end row -->
        @endsection
