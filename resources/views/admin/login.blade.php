<!DOCTYPE html>
<html>
<head>
    <title>IHS - Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/all.css') }}">
    <script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>

</head>
<body>

<div class="app-container app-login">
    <div class="flex-center">
        <div class="app-header"></div>
        <div class="app-body">
            <div class="loader-container text-center">
                <div class="icon">
                    <div class="sk-folding-cube">
                        <div class="sk-cube1 sk-cube"></div>
                        <div class="sk-cube2 sk-cube"></div>
                        <div class="sk-cube4 sk-cube"></div>
                        <div class="sk-cube3 sk-cube"></div>
                    </div>
                </div>
                <div class="title">Logging in...</div>
            </div>
            <div class="app-block">
                <div class="app-form">
                    <div class="form-header">
                        <div class="app-brand"><span class="highlight">IHS</span> Admin</div>
                    </div>
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-user" aria-hidden="true"></i></span>
                            <input class="form-control" id="email" type="email" class="form-control" name="email"
                                   value="{{ old('email') }}" required autofocus
                                   aria-describedby="basic-addon1" placeholder="Email Address">
                        </div>
                        <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="Password"
                                   aria-describedby="basic-addon2">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success btn-submit" value="Login">
                        </div>
                    </form>


                </div>
            </div>
        </div>
        <div class="app-footer">
        </div>
    </div>
</div>
</body>
</html>
