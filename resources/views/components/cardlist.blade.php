<div class="cardlist">

    <header class="cardlistHeader">
        <h1>{{ $title }}</h1>
        @isset($createRoute)
            <a class="iconButton" href="{{ $createRoute }}">
                @include('partials/icons/add')
            </a>
        @endisset
    </header>

    <div class="cardlistMain">
        {{ $slot }}
    </div>
</div>
