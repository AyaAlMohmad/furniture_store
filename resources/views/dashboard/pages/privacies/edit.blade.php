@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('privacies.update',$item->id) }}">
                    @csrf
                    @method('put')
                    <div class="widget-main">

                        <div class="tab-content padding-4">
                            <div class="form-group">
                                      <label for="title">
                                          {{ __('dashboard.title') }}
                                      </label>

                                      <input class="form-control" required type="text"
                                         name="title" value="{{ $item->title }}">
                                      @error( 'title')
                                          <div>{{ $message }}</div>
                                      @enderror

                                  </div><br><br>
                                  <div class="form-group">
                                    <label> {{ __('dashboard.description') }}</label>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card m-b-30">
                                                <div class="card-body">
                    
                                                        <textarea id="elm1" name="description" required>{{ $item->description }}</textarea>
                                             
                    
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->  
                                </div>
                               
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
