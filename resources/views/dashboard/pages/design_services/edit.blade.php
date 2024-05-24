@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('design_services.update', $item->id) }}">
                    @csrf
                    @method('put')
                    <div class="widget-main">

                        <div class="tab-content padding-4">
                            <div class="form-group">
                                <label for="title">
                                    {{ __('dashboard.title') }}
                                </label>

                                <input class="form-control" required type="text" name="title"
                                    value="{{ $item->title }}">
                                @error('title')
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
    

                            <div class="form-group">
                                <label for="file" class="col-sm-2 control-label no-padding-right">@lang('dashboard.image')
                                </label>
                                <div>

                                    <div>
                                        <input type="file" name="images[]" multiple>
                                        @foreach ($item->images as $image)
                                            <img src="{{ asset('images/designService/' . $image->image) }}" width="100"
                                                height="100">
                                        @endforeach
                                        <!-- /section:custom/file-input -->
                                    </div>

                                    @error('image')
                                        <div>{{ $message }}</div>
                                    @enderror

                                </div>
                                @push('js')
                                    <script type="text/javascript">
                                        jQuery(function($) {





                                            $('#id-input-file-3').ace_file_input({
                                                style: 'well',
                                                btn_choose: 'Drop files here or click to choose',
                                                btn_change: null,
                                                no_icon: 'ace-icon fa fa-cloud-upload',
                                                droppable: true,
                                                thumbnail: 'small' //large | fit
                                                    //,icon_remove:null//set null, to hide remove/reset button
                                                    /**,before_change:function(files, dropped) {
                                                        //Check an example below
                                                        //or examples/file-upload.html
                                                        return true;
                                                    }*/
                                                    /**,before_remove : function() {
                                                        return true;
                                                    }*/
                                                    ,
                                                preview_error: function(filename, error_code) {
                                                    //name of the file that failed
                                                    //error_code values
                                                    //1 = 'FILE_LOAD_FAILED',
                                                    //2 = 'IMAGE_LOAD_FAILED',
                                                    //3 = 'THUMBNAIL_FAILED'
                                                    //alert(error_code);
                                                }

                                            }).on('change', function() {
                                                //console.log($(this).data('ace_input_files'));
                                                //console.log($(this).data('ace_input_method'));
                                            });


                                    
                                            $('#modal-form input[type=file]').ace_file_input({
                                                style: 'well',
                                                btn_choose: 'Drop files here or click to choose',
                                                btn_change: null,
                                                no_icon: 'ace-icon fa fa-cloud-upload',
                                                droppable: true,
                                                thumbnail: 'large'

                                            })

                                            $('#modal-form').on('shown.bs.modal', function() {
                                                if (!ace.vars['touch']) {
                                                    $(this).find('.chosen-container').each(function() {
                                                        $(this).find('a:first-child').css('width', '210px');
                                                        $(this).find('.chosen-drop').css('width', '210px');
                                                        $(this).find('.chosen-search input').css('width', '200px');
                                                    });
                                                }
                                            })
                                    

                                            $(document).one('ajaxloadstart.page', function(e) {
                                                $('textarea[class*=autosize]').trigger('autosize.destroy');
                                                $('.limiterBox,.autosizejs').remove();
                                                $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu')
                                                    .remove();
                                            });

                                        });
                                    </script>
                                @endpush

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
