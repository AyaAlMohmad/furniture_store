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
                                    <th>{{ __('dashboard.image') }}</th>                        
                                    <th>{{ __('dashboard.name') }}</th>
                                    <th>{{ __('dashboard.color') }}</th>
                                    <th>{{ __('dashboard.SubCategory') }}</th>
                                    <th>{{ __('dashboard.category') }}</th>
                                    <th>{{ __('dashboard.description') }}</th>
                                    <th>{{ __('dashboard.material') }}</th>
                    

                                </tr>
                            </thead>


                            <tbody>

                                <tr>
                                    <td><img style="width: 90px; height: 90px;"
                                            src="{{ asset('images/product/' . $item->image_main) }}">
                                    </td>
                                  
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->designer->name }}</td>
                                    <td>
                                    @foreach ($item->colors as $color)
                                    {{ $color->translate($key)->name }}<br>
                                    @endforeach 
                                </td>
                                    <td>{{ $item->subCategory->name }}</td>
                                    <td>{{ $item->subCategory->category->name }}</td>
                                    <td style="word-break: break-all;">{{ $item->description }}</td>
                                    <td >{{ $item->material }}</td>

                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
    <!-- end row -->
@endsection
