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
                                <th>{{ __('dashboard.image') }}</th>
                                <th>{{ __('dashboard.title') }}</th>
                             
                                <th>{{ __('dashboard.pdf') }}</th>
                                
                            </tr>
                        </thead>


                        <tbody>

                            <tr>

                                <td><img style="width: 90px; height: 90px;"
                                    src="{{ asset('images/Villa/' . $item->image) }}">
                            </td>
                                <td >{{ $item->title }}</td>
                              <td>
                                    <a target="_blank" href="{{ asset('pdfs/Villa/' . $item->pdf) }}">
                                        <i class="far fa-file-pdf mdi-400px" style="color: red;"></i> {{ $item->pdf }}
                                    </a>
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
