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
                                <th >{{ __('dashboard.image') }}</th>
                                
                            </tr>
                        </thead>


                        <tbody>

                                <tr>
                                    <td><img style="width: 90px; height: 90px;"
                                            src="{{ asset('images/slider/' . $image->image) }}"></td>
                                    
                                </tr>
                          
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
