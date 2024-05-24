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
                                   

                                </tr>
                            </thead>


                            <tbody>
                              
                                       <tr>
                                                <td>{{ $item->name }}</td>

                                                <td>
                                                    <a href='mailto: {{ $item->email }}'>{{ $item->email }}</a>
                                                    
                                                </td>
                                                <td><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a> </td>
                                                {{-- <td>{{ $item->phone }}</td> --}}
                                                <td>{{ $item->gender }}</td>

                                             
                                            </tr>
                          

                            </tbody>
                        </table>

                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <!-- end row -->
@endsection
