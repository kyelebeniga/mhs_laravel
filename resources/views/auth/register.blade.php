<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | MHS</title>
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/notify.js') }}"></script>
</head> 
<body>
    <section class="main">
        <div class="login-container">
            <h1>Signup</h1>
            <form class="login">
                @csrf
                <input type="text" id="user" name="name" class="user" placeholder="Username" required>
                <input type="password" id="pass" name="password" class="pass" placeholder="Password" required>
                <input type="submit" class="btn" name="submit_login" value="Signup">
                <p><a href="{{ route('login') }}">Cancel</a></p>
            </form>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $('form').on('submit', function(e){
                e.preventDefault();
                var name = $('#user').val();
                var password = $('#pass').val();
                var formData = new FormData(this);
                
                $.ajax({
                    type: 'POST',
                    url: 'saveUser',
                    data: formData,
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data.exists){
                            $.notify('User already exists', {position:"top center"});
                        }
                        else if(data.success){
                            $.notify('Success!', {position:"top center",className:"success"});
                            setTimeout(function() { 
                                window.location = "{{ route('login') }}"; 
                            }, 1000);
                        }
                    }
                });
            })
        });
    </script>
</body>
</html>