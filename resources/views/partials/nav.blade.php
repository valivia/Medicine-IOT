<nav class="navWrapper">
    <div class="navMain">
        <a class="back" href="{{ url()->previous() }}">@include('/partials/icons/back') Back </a>
        <a href="{{ route('patient.index') }}">@include('/partials/icons/home') Home</a>
        {{-- <a href="{{ route('logout') }}">@include('/partials/icons/signout')Logout</a> --}}
    </div>
</nav>
