@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
               



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('contacts.store') }}">
                    @csrf
                    <div class="widget-main">

                        <div class="tab-content padding-4">
                              <div class="form-group">
                                        <label for="location">
                                            {{ __('dashboard.location') }}
                                        </label>

                                        <input class="form-control"  type="text"
                                           name="location">
                                        @error( 'location')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror

                                    </div><br><br>
                                    <div class="form-group">

                                        <label for="phone">
                                            {{ __('dashboard.mobile') }}
                                        </label>
                                        <div>
                                            <input type="text" name="phone" 
                                            class="form-control"  
                                             >
                                        </div>
                                        @error('phone')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            {{ __('dashboard.email') }}
                                        </label>
                                        <div>
                                            <input type="email" name="email"
                                             class="form-control" >
                                        </div>
                                            @error( 'email')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="website">
                                            {{ __('dashboard.website') }}
                                        </label>
                                        <div>
                                            <input type="text" name="website"
                                             class="form-control" >
                                        </div>
                                            @error( 'website')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                       
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
