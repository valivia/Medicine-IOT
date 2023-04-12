<section class="formSection">
    <label for="{{ $name }}">{{ $label }}</label>
    <input placeholder="{{ $placeholder }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"
        @isset($type) type="{{ $type }}" @else type="text" @endisset
        @if ($required) required @endif>
    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</section>
