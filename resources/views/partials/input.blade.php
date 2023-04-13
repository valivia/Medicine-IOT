<section class="formSection">
    <label for="{{ $name }}">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"
        @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
        @isset($type) type="{{ $type }}" @else type="text" @endisset
        @if ($required) required @endif>
    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</section>
