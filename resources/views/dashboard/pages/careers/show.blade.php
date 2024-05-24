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
                                <th>{{ __('dashboard.title') }}</th>
                                <th>{{ __('dashboard.your_tasks') }}</th>
                                <th>{{ __('dashboard.career') }}</th>
                            </tr>
                        </thead>


                        <tbody>

                            <tr>

                                <td style="word-break: break-all;">{{ $item->title }}</td>
                                <td style="word-break: break-all;">{{ $item->your_tasks }}</td>
                                <td style="word-break: break-all;">{{ $item->carrer }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
