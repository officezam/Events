<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Your Membership Registration Confirmed</h3></div>
            <div class="panel-body">
                <h5>Name : {{ $user->first_name.' '.$user->last_name }}</h5>
                <h5>LoginId : {{ $user->email }}</h5>
                <h5>Password : {{  $user->first_password }}</h5>
                <h5>Membership# : {{ $user->membership_number }}</h5>
                <h5>Date of Birth : {{ $user->date_of_birth }}</h5>
                <h5>Email : {{ $user->email }}</h5>
                {{--Your Email is successfully verified. Click here to {{ $user->first_password }}--}}
{{--                <a href="{{route('sendEmailDone', ["email" => $user->email,'vrifytoken'=>$user->berifytoken])}}">login</a>--}}
            </div>
        </div>
    </div>
</div>

</body>
</html>

