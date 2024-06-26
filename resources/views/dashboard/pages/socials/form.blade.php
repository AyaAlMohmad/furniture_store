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
                    action="{{ route('socials.store') }}">
                    @csrf
                    <div class="widget-main">

                        <div class="tab-content padding-4">
                            @foreach (config('app.languages') as $locale => $lang)
                                <div id="{{ $locale }}" class="tab-pane {{ $lang == 'English' ? 'active' : '' }}">
                   
                                    <div class="form-group">
                                        <label for="{{ $locale }}[title]">
                                            {{ __('dashboard.title', [], $locale) }}
                                        </label>

                                        <input class="form-control"  type="text"
                                            placeholder="{{ $locale }}" name="{{ $locale }}[title]">
                                        @error($locale . '.title')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror

                                    </div><br><br>
                            
                                </div>
                            @endforeach
                        </div><br><br>

                        <div class="form-group">
                            <label for="type">
                                {{ __('dashboard.type') }}
                            </label>

                            <input class="form-control"  type="text"
                                placeholder="" name="type">
                            @error( 'type')
                                <div style="color: red">{{ $message }}</div>
                            @enderror

                        </div><br><br>
                        <div class="form-group">
                            <label for="link">
                                {{ __('dashboard.link') }}
                            </label>

                            <input class="form-control"  type="text"
                                placeholder="" name="link">
                            @error( 'link')
                                <div style="color: red">{{ $message }}</div>
                            @enderror

                        </div><br><br>



                        <div class="card-body">

                            <h4 class="mt-0 header-title">Images</h4>


                            <div class="m-b-30">
                                <form action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="image" type="file" multiple="multiple">
                                    </div>
                                </form>
                            </div>



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
