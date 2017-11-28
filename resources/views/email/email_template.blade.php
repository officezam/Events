<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>


<div class=”container”>
    <div class=”row”>
        <div class=”col-md-8 col-md-offset-2">
        <div class=”panel panel-default”>
            <div class=”panel-heading”>Registration Confirmed</div>
            <div class=”panel-body”>
                Your Email is successfully verified. Click here to
                <a href=”{{route('sendEmailDone', ["email" => $user->email,'vrifytoken'=>$user->berifytoken])}}”>login</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>

