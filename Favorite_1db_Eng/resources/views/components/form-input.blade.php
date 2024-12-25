<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @if($type === 'textarea')
        <textarea class="form-control" 
                id="{{ $name }}" 
                name="{{ $name }}" 
                rows="3"
                {{ $required ? 'required' : '' }}>{{ $value }}</textarea>
    @elseif($type === 'file')
        <input type="file" 
               class="form-control" 
               id="{{ $name }}" 
               name="{{ $name }}"
               accept="image/*"
               {{ $required ? 'required' : '' }}>
        @if($value)
            <img src="{{ asset('storage/' . $value) }}" width="100" class="mt-2">
        @endif
    @else
        <input type="{{ $type }}" 
               class="form-control" 
               id="{{ $name }}" 
               name="{{ $name }}" 
               value="{{ $value }}"
               {{ $required ? 'required' : '' }}>
    @endif
</div>