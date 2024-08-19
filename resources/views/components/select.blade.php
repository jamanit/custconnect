<div class="mb-3">
    <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>

    <select name="{{ $name }}" id="{{ $id ?? $name }}" class="form-control select2 {{ $name }} {{ $attributes->get('class') }} @error($name) is-invalid @enderror">
        <option value="">- {{ __('user.select') }} -</option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" {{ old($name, $selected) == $value ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
    @enderror
</div>
