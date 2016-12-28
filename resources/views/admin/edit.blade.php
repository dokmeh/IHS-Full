@extends('admin.layout')
@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Project #{{$project->id}}

                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="/admin/project/{{$project->id}}/edit" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="col-md-6">
                                <input type="text" name="title" class="form-control" value="{{ $project->title }}"
                                       placeholder="{{ $project->title }}">
                                <input type="text" name="client" value="{{ $project->client }}" class="form-control"
                                       placeholder="{{ $project->client }}">
                                <input type="text" name="address" value="{{ $project->address }}" class="form-control"
                                       placeholder="{{ $project->address }}">
                                <input type="number" value="{{ $project->site_area }}" name="site_area"
                                       class="form-control"
                                       placeholder="Site Area Meter...">
                                <input type="number" value="{{ $project->floor_area }}" name="floor_area"
                                       class="form-control"
                                       placeholder="Floor Area Meter...">


                                <select name="category_id" class="select2">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>

                                <select name="status_id" class="select2">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">


                                <textarea id="description" name="description" rows="3" class="form-control"
                                          value="{{ $project->description }}"
                                          placeholder="{{ $project->description }}">{{ $project->description }}</textarea>
                                <Br>
                                <input name="design_at" value="{{ $project->design_at }}" type="number" min="1900"
                                       max="2099" step="1"
                                       placeholder="Designed At"/>
                                <input name="completed_at" value="{{ $project->completed_at }}" type="number" min="1900"
                                       max="2099" step="1"
                                       placeholder="Completed At"/>
                                <br><br>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/admin/project/{{ $project->id }}/edit" class="btn btn-default">Cancel</a>
                                <a href="/admin/project/{{ $project->id }}/deletebtn" class="btn btn-danger">Delete</a>
                            </div>

                        </form>

                    </div>
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
                    @if (count($project->photos) > 0)

                        <hr>
                        @foreach ($project->photos as $photo)
                            <img width="200px" src="{{ $photo->image }}" alt=""><a
                                    href="/admin/photo/{{ $photo->id }}/deletebtn"><i
                                        class="fa fa-times fa-3x"
                                        aria-hidden="true"></i></a>
                        @endforeach
                    @endif
                    <hr>
                    <h2>Awards:</h2>
{{--                    {{ dd($project->awards) }}--}}
                    @foreach ($project->awards as $award)

                        <h3>{{ $award->name }}</h3>
                        <p>{!! $award->description !!}</p>
                        <img width="100px" src="{{ $award->photo->image }}" alt="">
                        <button id="show" class="btn btn-success">Edit This Award</button>
                        <div id="award-edit">
                            <button id="hide" class="btn btn-danger">Close this form</button>
                            <form action="/admin/awards/{{ $award->id }}/edit" method="POST"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text" name="name" value="{{ $award->name }}" class="form-control"
                                       placeholder="{{ $award->name }}">
                                <input name="date" value="{{ $award->date }}" type="number" min="1900" max="2099"
                                       step="1"
                                       placeholder="{{ $award->date }}"/><br>
                                <strong>Upload an icon for this award</strong><input type="file" name="file">
                                <textarea id="award-description" value="{{ $award->description }}"
                                          name="description"
                                          rows="1" class="form-control"
                                          placeholder="{{ $award->description }}">{{ $award->description }}</textarea><br>
                                <button type="submit" class="btn btn-primary">Save Award</button>
                                <a href="/admin/project/{{ $project->id }}/edit" class="btn btn-default">Cancel</a>
                                <a href="/admin/award/{{ $award->id }}/deletebtn" class="btn btn-danger">Delete
                                                                                                         Award</a>

                            </form>
                            <script>
                                tinymce.get('award-description').setContent('{{ $award->description }}');

                            </script>
                        </div>


                </div>

                @endforeach
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#award-edit").hide();

            $("#show").click(function () {
                $("#award-edit").show();
                $("#show").hide();
            });


            $("#hide").click(function () {
                $("#award-edit").hide();
                $("#show").show();

            });

        });

    </script>
    <script>
        tinymce.get('description').setContent('{{ $project->description }}');
    </script>
@stop
