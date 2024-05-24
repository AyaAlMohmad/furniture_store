@extends('dashboard.layout.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                
                <ul class="nav nav-tabs" id="myTab2">
                    @foreach (config('app.languages') as $key => $lang)
                        <li class="{{ $lang == 'English' ? 'active' : '' }}">
                            <a data-toggle="tab" class="nav-link" href="#{{ $key }}">{{ $lang }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content padding-4">
                    @foreach (config('app.languages') as $key => $lang)
                        <!-- div.dataTables_borderWrap -->
                        <div class="tab-pane {{ $lang == 'English' ? 'active' : '' }}" id="{{ $key }}">

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th >{{ __('dashboard.image', [], $key) }}</th>
                                        <th >{{ __('dashboard.title', [], $key) }}</th>
                              
                                        <th>{{ __('dashboard.pdf', [], $key) }}</th>
                                    
                                      
                                        <th >{{ __('dashboard.actions', [], $key) }}</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($items->where('locale',$key) as $data)
                                        <tr>
                                       
                                            <td><img style="width: 90px; height: 90px;"
                                                src="{{ asset('images/Villa/' . $data->image) }}">
                                        </td>
                                            <td >{{ $data->translate($key)->title }}</td>
                                            <td>
                                                <a target="_blank" href="{{ asset('pdfs/Villa/' . $data->pdf) }}">
                                                    <i class="far fa-file-pdf mdi-400px" style="color: red;"></i> {{ $data->pdf }}
                                                </a>
                                             </td>
                                                <td>
                                                    <a href="{{ route('villas.restore', $data->id) }}">
                                                        <i class="ace-icon fa fa-undo bigger-120"> </i>
                                                    </a>
                                                    <a style="color:red"
                                                        href="{{ route('villas.finaldelete', $data->id) }}">
                                                        <i class="ace-icon dripicons-trash bigger-120"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                        </div>
                        @endforeach
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        @endsection
