@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    {{ $project->title }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Description:</h4>
                            <p>{!! $project->description !!}</p>

                            <h4>Client:</h4>
                            <p>{{ $project->client}}</p>

                            <h4>Address:</h4>
                            <p>{{ $project->address }}</p>


                        </div>


                        <div class="col-sm-6">

                            <h4>Designed At:</h4>
                            <p>{{ $project->design_at}}</p>

                            <h4>Completed At:</h4>
                            <p>{{ $project->completed_at }}</p>

                            Status: <span
                                    class="badge @if($project->status->name == 'Completed') badge-success @else badge-warning @endif
                                            badge-icon"><i
                                        class="fa @if ($project->status->name == 'Completed')
                                                fa-check
                                                                                        @else fa-clock-o @endif"
                                        aria-hidden="true"></i><span>{{ $project->status->name }}</span></span>

                            <p>Category: {{ $project->category->name }}</p>

                            {{--@if (count($project->photos) > 0)--}}

                            {{--<div class="col-md-6">--}}
                            {{--<img src="{{ $project->photos->first()->image }}" alt="">--}}
                            {{--</div>--}}
                            {{--@endif--}}

                        </div>
                    </div>
                    <div class="row">

                        <h3 class="text-danger">This project achieved some awards?</h3>
                        <button id="show" class="btn btn-success">So add it</button>
                        <div id="award">
                            <button id="hide" class="btn btn-danger">Close this form</button>

                            <form action="/admin/project/{{ $project->id }}/awards" method="POST"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <input type="text" name="name" class="form-control" placeholder="Award's Name">
                                <input name="date" type="number" min="1900" max="2099" step="1"
                                       placeholder="Award's Achieved Year"/><br>
                                <strong>Upload an icon for this award</strong><input type="file" name="file">
                                <textarea name="description" rows="1" class="form-control"
                                          placeholder="Award's Description"></textarea><br>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>


                    {{--<div class="col-md-6">--}}
                    {{--@foreach ($project->awards as $award)--}}
                    {{--<p>{{ $award->photo->image }}</p>--}}
                    {{--@endforeach--}}

                    {{--</div>--}}


                    <hr>
                    <h2 class="text-center">Project Photos</h2><br>
                    <form action="/admin/project/{{ $project->id }}/photos" class="dropzone" id="my-awesome-dropzone"
                          method="POST">
                        {{ csrf_field() }}
                        <div class="dz-message" data-dz-message><span>Drop project's Photos here</span></div>

                    </form>
                    <br>
                    <h3 class="text-center">Thumbnail</h3>
                    <form action="/admin/project/{{ $project->id }}/thumbnails" class="dropzone"
                          id="my-awesome-dropzone"
                          method="POST">
                        {{ csrf_field() }}
                        <div class="dz-message" data-dz-message><span>Drop project's Thumbnail here</span></div>

                    </form>


                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#award").hide();
            $("#hide").click(function () {
                $("#award").hide();
                $("#show").show();

            });
            $("#show").click(function () {
                $("#award").show();
                $("#show").hide();
            });
        });

    </script>
@stop
