<article class="card">

    {{-- Displayed info --}}
    <div class="cardInfo">
        <header>
            <h3>{{ $title }}</h3>
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>

    {{-- Interactivity --}}
    <div class="cardInteractions">
        {{-- Edit --}}
        @isset($editRoute)
            <a class="iconButton" href="{{ $editRoute }}">
                @include('partials/icons/edit')
            </a>
        @endisset

        {{-- Delete --}}
        @isset($deleteRoute)
            <form method="POST" action="{{ $deleteRoute }}">
                @method('DELETE')
                @csrf
                <button class="iconButton" type="submit">
                    @include('partials/icons/bin')
                </button>
            </form>
        @endisset
    </div>


</article>
