@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('video.update',$item->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                    
                        <div class="card-body">

                            <h4 class="mt-0 header-title">{{ __('dashboard.video') }}</h4>


                            <div class="m-b-30">
                                <form action="#" class="dropzone">
                                   
                                    <div class="fallback">
                                   
                                       <input name="video" type="file" id="id-input-file-3" />
                                    </div>
                                    <video src="{{ asset('videos/slider/' . $item->video) }}" width="100" height="100">
                                    </video>
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
                    $("#previewvideo").attr("src", reader.result);
                }
                reader.readAsDataURL(file);


            }
        }
    </script>
@endsection
