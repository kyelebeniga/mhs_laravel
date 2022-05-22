<head>
    <link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">
</head>
<header>
    <a href="#" class="logo">MHS</a>
    <ul>
        <li><a href="{{ url('/') }}" class="link">Home</a></li>
        @if(Auth::user()->role == '1')
            <li><a href="{{ url('adminMovie') }}" class="link">Movies</a></li>
        @else
            <li><a href="{{ url('userMovie') }}" class="link">Movies</a></li>
        @endif
        <li><a href="#">{{ Auth::user()->name }}</a>
            <ul class="dropdown">
                @if(Auth::user()->role == '1')
                    <li><a href="{{ url('adminhistory') }}" class="link">History</a></li>
                @else
                    <li><a href="{{ url('userhistory') }}" class="link">History</a></li>
                @endif
                <li><a href="{{ route('logout') }}" class="link">Logout</a></li>
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