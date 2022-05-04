<head>
    <link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">
</head>
<header>
    <a href="#" class="logo">MHS</a>
    <ul>
        <li><a href="#" class="link">Home</a></li>
        <li><a href="#" class="link">Movies</a></li>
        <li><a href="#">Username</a>
            <ul>
                <li><a href="#" class="link">History</a></li>
                <li><a href="#" class="link">Logout</a></li>
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