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
                    action="{{ route('design_services.store') }}">
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
                                <label for="file" class="col-sm-2 control-label no-padding-right">@lang('dashboard.image')
                                </label>
                                <div>
    
                                    <div >
                                        <input type="file" name="images[]"  multiple>
    
                                    </div>
    
                                    @error('image')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
    
                                </div>
                                @push('js')
                                    <script type="text/javascript">
                                        jQuery(function($) {
    
    
    
    
                                            //pre-show a file name, for example a previously selected file
                                            //$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt')
    
    
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
    
    
                                            //$('#id-input-file-3')
                                            //.ace_file_input('show_file_list', [
                                            //{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
                                            //{type: 'file', name: 'hello.txt'}
                                            //]);
    
    
    
    
                                            /////////
                                            $('#modal-form input[type=file]').ace_file_input({
                                                style: 'well',
                                                btn_choose: 'Drop files here or click to choose',
                                                btn_change: null,
                                                no_icon: 'ace-icon fa fa-cloud-upload',
                                                droppable: true,
                                                thumbnail: 'large'
    
                                            })
    
                                            //chosen plugin inside a modal will have a zero width because the select element is originally hidden
                                            //and its width cannot be determined.
                                            //so we set the width after modal is show
                                            $('#modal-form').on('shown.bs.modal', function() {
                                                if (!ace.vars['touch']) {
                                                    $(this).find('.chosen-container').each(function() {
                                                        $(this).find('a:first-child').css('width', '210px');
                                                        $(this).find('.chosen-drop').css('width', '210px');
                                                        $(this).find('.chosen-search input').css('width', '200px');
                                                    });
                                                }
                                            })
                                            /**
                                            //or you can activate the chosen plugin after modal is shown
                                            //this way select element becomes visible with dimensions and chosen works as expected
                                            $('#modal-form').on('shown', function () {
                                                $(this).find('.modal-chosen').chosen();
                                            })
                                            */
    
    
    
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
