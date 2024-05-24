@extends('dashboard.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">



                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('products.update', $product->id)  }}">
                    @csrf
                    @method('put')

                    <div class="widget-main">

                        <div class="tab-content padding-4">
                            <div class="form-group">
                                <label for="name">
                                    {{ __('dashboard.name') }}
                                </label>

                                <input class="form-control" required type="text" name="name"
                                    value="{{ $product->name }}">
                                @error('name')
                                    <div>{{ $message }}</div>
                                @enderror

                            </div><br><br>
                            <div class="form-group">
                                <label for="material">
                                    {{ __('dashboard.material') }}
                                </label>

                                <input class="form-control"  type="text" name="material"
                                    value="{{ $product->material }}">
                                @error('material')
                                    <div>{{ $message }}</div>
                                @enderror

                            </div><br><br>

                            <div class="form-group">
                                <label> {{ __('dashboard.description') }}</label>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                
                                                    <textarea id="elm1" name="description" required>{{ $product->description }}</textarea>
                                         
                
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->  
                            </div>

                        </div>

                        {{-- <div class="form-group">
                            <label for="price">
                                @lang('dashboard.price')

                            </label>

                            <input class="form-control" required type="text" name="price"
                                value="{{ $product->price }}">
                            @error('price')
                                <div>{{ $message }}</div>
                            @enderror

                        </div><br><br> --}}
                        {{-- <div class="form-group">
                            <label for="designer_id">
                                @lang('dashboard.designer')

                            </label>
                            <select name="designer_id" id="designer_id">
                                <option value="{{ $product->designer_id }}">{{ $product->designer->name }} ..</option>>
                                @foreach ($designers as $designer)
                                    <option value="{{ $designer->id }}">{{ $designer->name }}</option>
                                @endforeach
                            </select>

                        </div> --}}
                        <div class="form-group">
                            <label for="sub_category_id">
                                @lang('dashboard.SubCategory')
                            </label>
                            <select name="sub_category_id" id="sub_category_id">
                                <option value="{{ $product->sub_category_id }}">{{ $product->subCategory->category->name }} =>  {{ $product->subCategory->name }} ..
                                </option>>
                                @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->category->name }} =>  {{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>



  <div class="form-group">
    <label for="color_id">@lang('dashboard.color')</label>
    @foreach ($colors as $color)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="color_id[]" id="color_{{ $color->id }}" value="{{ $color->id }}" {{ $product->colors->contains($color->id) ? 'checked' : '' }}>
            <label class="form-check-label" for="color_{{ $color->id }}">
                {{ $color->name }}
            </label>
        </div>
    @endforeach
</div>

                        <div class="form-group">
                            <label for="file" class="col-sm-2 control-label no-padding-right">@lang('dashboard.image')
                            </label>
                            <div>

                                <div class="form-group">
                                    <div class="col-xs-9">
                                        <input type="file" name="images[]" id="id-input-file-3" multiple>

                                        <!-- /section:custom/file-input -->
                                    </div>
                                    @foreach ($product->images as $image)
                                        <img src="{{ asset('images/product/' . $image->image) }}" width="100"
                                            height="100">
                                    @endforeach
                                </div>
                                @error('image')
                                    <div>{{ $message }}</div>
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
                        <div class="card-body">

                            <h4 class="mt-0 header-title">@lang('dashboard.image_main')</h4>


                            <div class="m-b-30">
                                <form action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="image_main" type="file" >
                                    </div>
                                    <img src="{{ asset('images/product/' . $product->image_main) }}" width="100"
                                    height="100">
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
    </div>
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
