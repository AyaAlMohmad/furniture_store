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
                                <th>{{ __('dashboard.name') }}</th>
                                <th >{{ __('dashboard.description') }}</th>
                            </tr>
                        </thead>


                        <tbody>

                            <tr>
                                <td>{{ $item->name }}</td>
                                <td style="word-break: break-all;">{{ $item->description }}</td>

                            </tr>

                        </tbody>
                    </table>
                </div>


            </div>
        </div> <!-- end col -->
    </div>

    <!-- end row -->
@endsection
