@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">


                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('dashboard.user') }}</th>
                                <th>{{ __('dashboard.mobile') }}</th>
                                <th>{{ __('dashboard.product') }}</th>
                                <th>{{ __('dashboard.image') }}</th>


                            </tr>
                        </thead>


                        <tbody>
                        
                                <tr>
                                    <td>

                                        {{ $item->user->name }}


                                    </td>
                                    <td>

                                        {{ $item->user->phone }}


                                    </td>
                                    <td>

                                        {{ $item->product->translate()->name }}


                                    </td>
                                    <td><img style="width: 90px; height: 90px;"
                                            src="{{ asset('images/product/' . $item->product->images()->first()->image) }}">
                                    </td>
                                </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
