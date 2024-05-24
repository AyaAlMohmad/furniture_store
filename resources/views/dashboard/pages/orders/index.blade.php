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
                                            <th>{{ __('dashboard.user', [], $key) }}</th>
                                            <th>{{ __('dashboard.mobile', [], $key) }}</th>
                                            <th>{{ __('dashboard.email', [], $key) }}</th>
                                            <th>{{ __('dashboard.product', [], $key) }}</th>
                                            <th>{{ __('dashboard.image', [], $key) }}</th> 

                                            <th>{{ __('dashboard.actions', [], $key) }}</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($items as $data)
                                            <tr>
                                                <td>
                                                    <div class="page-content-wrapper ">

                                                        <div class="container-fluid">
                                                            
                                                            <div class="row text-center">
                                                                <div class="col-sm-6 col-md-4 col-xl-3 m-b-30">
                                                                    <button type="button" class="btn btn-primary waves-effect waves-light custom-padding-width-alert"
                                                                    data-name="{{ $data->user->name }}" 
                                                                    data-email="{{ $data->user->email }}"
                                                                    data-phone="{{ $data->user->phone }}"
                                                                    data-product-name="{{ $data->product->translate($key)->name }}"
                                                                    data-product-image="{{ asset('images/product/' . $data->product->images()->first()->image) }}">
                                                                    {{ $data->user->name }}
                                                                    </button>
                                                                    
                                                                     </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                
                                                <td><a href="tel:{{ $data->user->phone }}">{{ $data->user->phone }}</a> </td>
                                                <td>
                                                    <a href='mailto: {{ $data->user->email }}'>{{ $data->user->email }}</a>
                                                </td>
                                                <td>


                                                    {{ $data->product->translate($key)->name }}


                                                </td>
                                                <td><img style="width: 90px; height: 90px;"
                                                        src="{{ asset('images/product/' . $data->product->images()->first()->image) }}">
                                                </td> 


                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons" style="display:flex;">
                                                     
                                                        <form method="POST"
                                                            action="{{ route('orders.destroy', $data->id) }}">
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
