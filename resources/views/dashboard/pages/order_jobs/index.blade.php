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
                                            <th >{{ __('dashboard.career', [], $key) }}</th>
                                            <th >{{ __('dashboard.name', [], $key) }}</th>
                                            <th >{{ __('dashboard.mobile', [], $key) }}</th>
                                            <th >{{ __('dashboard.cv', [], $key) }}</th>
                                          
                                            <th >{{ __('dashboard.actions', [], $key) }}</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($items as $data)
                                            <tr>
                                                <td>
                                           @foreach ($data->careers as $item)
                                           {{ $item->translate($key)->title }}
                                               
                                           @endforeach
                                        </td>
                                                <td>{{ $data->name }}</td>
                                                <td><a href="tel:{{ $data->phone }}">{{ $data->phone }}</a></td>
                                                <td>
                                                    <a target="_blank" href="{{ asset('pdfs/career/' . $data->cv) }}">
                                                        <i class="far fa-file-pdf mdi-400px" style="color: red;"></i> {{ $data->cv }}
                                                    </a>
                                                 </td>
                                                 

                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons" style="display:flex;">
                                                       
                                                        <a style="color:blue" href="{{ route('order_jobs.show', $data->id) }}">
                                                            <i class="dripicons-zoom-in bigger-120"
                                                                style="margin-right: 10px;"></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('order_jobs.destroy', $data->id) }}">
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
                            @endforeach
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    
            <!-- end row -->
        @endsection
