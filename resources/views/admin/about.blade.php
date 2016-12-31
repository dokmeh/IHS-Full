@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>About Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>About Page</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (count($about) > 0)

                            <h3>Header: </h3> <p>{{ $about->header }}</p>
                            <h3>Persian Header: </h3> <p>{{ $about->header_fa }}</p>

                            <hr>

                            <h3>Description: </h3>  <p>{!! $about->description !!}/p>
                            <h3>Persian Description: </h3>  <p>{!! $about->description_fa !!}</p>

                            @if (count($about->photos) > 0)
                                @foreach ($about->photos as $photo)

                                    <div class="col-md-55">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img style="width: 100%; display: block;" src="{{ $photo->image }}"
                                                     alt="image"/>
                                                <div class="mask">
                                                    <p>{{ $photo->name }}</p>
                                                    <div class="tools tools-bottom">

                                                        <a id="{{ $photo->id }}"
                                                           data-href="/admin/about/photo/{{ $photo->id }}/deletebtn"><i
                                                                    class="fa fa-times"></i></a>


                                                        <script>
                                                            $('a#{{ $photo->id }}').on('click', function () {
                                                                swal({
                                                                        title             : "Are you sure?",
                                                                        text              : "You will not be able to recover this!",
                                                                        type              : "warning",
                                                                        showCancelButton  : true,
                                                                        confirmButtonColor: "#DD6B55",
                                                                        confirmButtonText : "Yes, delete it!",
                                                                        closeOnConfirm    : false
                                                                    },
                                                                    function () {
                                                                        href                 = $('#{{ $photo->id }}').attr('data-href');
                                                                        window.location.href = href;
                                                                    });
                                                            })
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <p>{{ $photo->created_at }}</p>
                                            </div>
                                        </div>
                                    </div>


                                @endforeach


                            @endif

                        @else
                            <h3>Header: </h3>  <p>No Header set yet</p>

                            <hr>

                            <h3>Description: </h3>  <p>No Description set yet</p>
                        @endif
                        <div class="clearfix"></div>
                        @if (count($about) < 1)

                            <form method="POST" action="/admin/about/create" id="demo-form2" data-parsley-validate
                                  class="form-horizontal form-label-left">
                                {{ csrf_field() }}
                                <h3>Create About</h3>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Header
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="header" id="first-name" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Persian
                                                                                                             Header
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="header_fa" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description: <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea type="hidden" name="description" title="description" id="description"
                                              style="display:block;"></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Persian Description: <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea type="hidden" name="description_fa" title="description" id="description"
                                              style="display:block;"></textarea>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>


                        @else

                            <form method="POST" action="/admin/about/update" id="demo-form2" data-parsley-validate
                                  class="form-horizontal form-label-left">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <h3>Edit About</h3>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Header
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="{{ $about->header }}" placeholder="{{ $about->header }}"
                                               type="text" name="header" id="first-name" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Persian
                                                                                                             Header
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="{{ $about->header_fa }}" placeholder="{{ $about->header_fa }}"
                                               type="text" id="last-name" name="header_fa" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description: <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea placeholder="{{ $about->description }}" type="hidden" name="description"
                                              title="description" id="description"
                                              style="display:block;">{{ $about->description }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Persian Description: <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea placeholder="{{ $about->description }}" type="hidden"
                                              name="description_fa" title="description" id="description"
                                              style="display:block;">{{ $about->description_fa }}</textarea>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>

                            <hr>



                        @endif

                        <form action="/admin/about/photos" class="dropzone"
                              id="myAwesomeDropzone"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="dz-message" data-dz-message><span>Drop certificates Photos here</span></div>
                            {{--<div id="preview-template" style="display: none;"></div>--}}

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop
