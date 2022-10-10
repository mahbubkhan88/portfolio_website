@extends('backend.layouts.login')

@section('title', 'Login')

@section('content')


<div class="container col-md-4 mx-auto login-card">
    <div class="row content-center>
        <div class=" login-box">
        <div class="col-md-12">
            <h1 class="admin-login-title">Admin Login</h1>
            <div class="login-box-body">
                <form action=" " class="loginForm">
                    <div class="form-group">
                        <label for="userName">Username</label>
                        <input required="" name="userName" value="" type="text" class="form-control" id="userName" aria-describedby="userName" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="userPassword">Password</label>
                        <input required="" name="userPassword" value="" type="password" class="form-control" id="userPassword" placeholder="Password">
                    </div>
                    <br>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-sm btn-block btn-danger">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@section('script')

<script type="text/javascript">
    $('.loginForm').on('submit', function(event) {
        event.preventDefault();
        let formData = $(this).serializeArray();
        let userName = formData[0]['value'];
        let password = formData[1]['value'];

        let url = "/onLogin";
        axios.post(url, {
            userName: userName,
            password: password
        }).then(function(response) {
            if (response.status == 200 && response.data == 1) {
                window.location.href = "/dashboard";
            } else {
                toastr.error('Login Fail ! Try Again');
            }

        }).catch(function(error) {
            toastr.error('Login Fail ! Try Again');
        })
    })
</script>

@endsection