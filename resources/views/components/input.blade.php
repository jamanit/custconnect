<div class="mb-3">
    <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}" value="{{ old($name, $value ?? '') }}" placeholder="{{ $placeholder }}" class="form-control {{ $name }} {{ $attributes->get('class') }} @error($name) is-invalid @enderror" {{ $attributes }}>

    @error($name)
        <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
    @enderror

    @if ($attributes->has('data-indicator') && $attributes->get('data-indicator') === 'pwindicator')
        <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
        </div>
    @endif
</div>
