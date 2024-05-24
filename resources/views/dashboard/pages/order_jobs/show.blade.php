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
                                <th>{{ __('dashboard.career') }}</th>
                                <th>{{ __('dashboard.name') }}</th>
                                <th>{{ __('dashboard.mobile') }}</th>
                                <th>{{ __('dashboard.cv') }}</th>

                            </tr>
                        </thead>


                        <tbody>

                            <tr>

                                <td>
                                    @foreach ($item->careers as $data)
                                    {{ $data->translate()->title }}
                                        
                                    @endforeach
                                 </td>
                                         <td>{{ $item->name }}</td>
                                         <td><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
                                         <td>
                                            <a target="_blank" href="{{ asset('pdfs/career/' . $item->cv) }}">
                                                <i class="far fa-file-pdf mdi-400px" style="color: red;"></i> {{ $item->cv }}
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
