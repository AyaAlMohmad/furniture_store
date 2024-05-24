@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('abouts.update',$item->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label> {{ __('dashboard.title') }}</label>
                            <input type="text" name="title" class="form-control"  placeholder="Title" value="{{ $item->title }}" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('dashboard.short_description') }}</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
            
                                                <textarea id="elm1" name="short_description" >{{ $item->short_description }}</textarea>
                                     
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->  
                           

                        </div>

                        <div class="form-group">
                            <label> {{ __('dashboard.description') }}</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
            
                                                <textarea id="elm1" name="description" >{{ $item->description }}</textarea>
                                     
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->  
                        </div>









                        <div class="card-body">

                            <h4 class="mt-0 header-title">Images</h4>


                            <div class="m-b-30">
                                <form action="#" class="dropzone">
                                    <div class="fallback">
                                        <img >
                                        <img src="{{ asset('images/about/' . $item->image) }}" width="100" height="100">
                                        <input name="image" type="file" id="id-input-file-3" />
                                    </div>
                                </form>
                            </div>



                        </div>


                        <div class="form-group">

                            <div class="col-sm-6 control-label no-padding-right">
                                <button type="submit" class="btn btn-sm btn-primary">save</button>
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
