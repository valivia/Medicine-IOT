<h1>
    @if ($method == 'POST')
        Add
    @else
        Edit
    @endif
    {{ $title }}
</h1>

<form class="form" action="{{ $route }}">
    @method($method ?? 'POST')
    @csrf

    {{ $slot }}

    @if (session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <button class="button" type="submit" data-variant="primary">
        @if ($method == 'POST')
            Add
        @else
            Edit
        @endif
    </button>

</form>
