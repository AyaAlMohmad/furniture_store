@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <ul class="nav nav-tabs" id="myTab2">
                    @foreach (config('app.languages')  as $key => $lang)
                        <li class="{{ $lang == 'English' ? 'active' : '' }}">
                            <a data-toggle="tab" class="nav-link " href="#{{ $key }}">{{ $lang }}</a>
                        </li>
                    @endforeach
                </ul>



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('categories.store') }}">
                    @csrf
                    <div class="widget-main">

                        <div class="tab-content padding-4">
                            @foreach (config('app.languages') as $locale => $lang)
                                <div id="{{ $locale }}" class="tab-pane {{ $lang == 'English' ? 'active' : '' }}">
                                   
                                    <div class="form-group">
                                        <label for="{{ $locale }}[name]">
                                            {{ __('dashboard.name', [], $locale) }}
                                        </label>

                                        <input class="form-control"  type="text"
                                            placeholder="{{ $locale }}" name="{{ $locale }}[name]">
                                        @error($locale . '.name')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror

                                    </div><br><br>
                                    <div class="form-group">

                                        <label for="{{ $locale }}[description]">
                                            {{ __('dashboard.description') }}
                                        </label>
                                        
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card m-b-30">
                                                        <div class="card-body">
                            
                                                                <textarea id="elm1" name="{{ $locale }}[description]" ></textarea>
                                                     
                            
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->  
                                   
                                        @error($locale . '.description')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            @endforeach
                        </div><br><br>





                       
                        <div class="form-group">
                            <div class="col-sm-6 control-label no-padding-right">
                                <button type="submit" class="btn btn-sm btn-primary"><i
                                        class="fa fa-save"></i>save</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
