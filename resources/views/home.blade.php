<!DOCTYPE html>
<head>
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
    <title>Home | MHS</title>
</head>
<body>
    <header>
        <a href="#" class="logo">MHS</a>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Movies</a></li>
            <li><a href="#">Username</a>
                <ul>
                    <li><a href="#">History</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>

    <script>
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            $('#carousel .slick').slick({
                dots:true,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 500,
            });
        });
    </script>
</body>
</html>