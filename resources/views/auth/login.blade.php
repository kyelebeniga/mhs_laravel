<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MHS</title>
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/notify.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head> 
<body>
    <section class="main">
        <div class="login-container">
            <h1>Login</h1>
            <form class="login">
                @csrf
                <input type="text" id="user" name="name" class="user" placeholder="Username" required>
                <input type="password" id="pass" name="password" class="password" placeholder="Password" required>
                <input type="submit" class="btn" name="submit_login" value="Login" id="loginButton">
                <p>Don't have an account? <a href="{{ url('register') }}">Signup</a></p>
            </form>
        </div>
    </section>
    
    <script>
        $(document).ready(function(){
            $('form').on('submit', function(e){

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                e.preventDefault();
                var name = $('#user').val();
                var password = $('#pass').val();

                $.ajax({
                    url: 'userLogin',
                    type: 'POST',
                    data:{
                        name: name,
                        password: password
                    },
                    success:function(data){
                        if(data.success){
                            window.location = "{{ url('/') }}";
                        }
                        else if(data.error){
                            $.notify('Invalid Credentials', {position:"top center"});
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>