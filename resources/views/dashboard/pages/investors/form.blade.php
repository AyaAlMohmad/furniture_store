@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <ul class="nav nav-tabs" id="myTab2">
                    @foreach (config('app.languages') as $key => $lang)
                        <li class="{{ $lang == 'English' ? 'active' : '' }}">
                            <a data-toggle="tab" class="nav-link " href="#{{ $key }}">{{ $lang }}</a>
                        </li>
                    @endforeach
                </ul>



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('investors.store') }}">
                    @csrf
                    <div class="widget-main">

                        <div class="tab-content padding-4">
                            @foreach (config('app.languages') as $locale => $lang)
                                <div id="{{ $locale }}" class="tab-pane {{ $lang == 'English' ? 'active' : '' }}">
                              
                                    <div class="form-group">
                                        <label for="{{ $locale }}[title]">
                                            {{ __('dashboard.title') }}
                                        </label>

                                        <input class="form-control"  type="text"
                                            name="{{ $locale }}[title]">
                                        @error($locale . '.title')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror

                                    </div><br><br>
                                    <div class="form-group">

                                        <label for="{{ $locale }}[description]">
                                            {{ __('dashboard.description') }}
                                        </label>
                                        <div>
                                            <textarea type="text" name="{{ $locale }}[description]" class="form-control"
                                              rows="5"  ></textarea>
                                        </div>
                                        @error($locale . '.description')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror

                                    </div>
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

                                </div><br><br>
                            @endforeach
                            <div class="form-group">
                                <label for="date">
                                    {{ __('dashboard.date') }}
                                </label>

                                <input class="form-control"  type="text"
                                    name="date">
                                @error( 'date')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror

                            </div><br><br>
                        </div>

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
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewImage").attr("src", reader.result);
                }
                reader.readAsDataURL(file);


            }
        }
    </script>
@endsection
