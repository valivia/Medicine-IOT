<section class="formSection">
    <label for="{{ $name }}">{{ $label }}</label>
    <input placeholder="{{ $placeholder }}" type="text" id="{{ $name }}" name="{{ $name }}"
        value="{{ $value }}" @if ($required) required @endif>
    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</section>
