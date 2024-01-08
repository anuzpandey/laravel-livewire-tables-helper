@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    @if ($status)
        @if ($type === 'icons')
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5 @if ($successValue === true) text-green-500 @else text-red-500 @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @elseif ($type === 'yes-no')
            @if ($successValue === true)
                <span>Yes</span>
            @else
                <span>No</span>
            @endif
        @endif
    @else
        @if ($type === 'icons')
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5 @if ($successValue === false) text-green-500 @else text-red-500 @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @elseif ($type === 'yes-no')
            @if ($successValue === false)
                <span>Yes</span>
            @else
                <span>No</span>
            @endif
        @endif
    @endif
@elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
    @if ($status)
        @if ($type === 'icons')
            <div class="form-check form-switch">
                <input wire:click="toggle('{{ $row->id }}', '{{ $columnName }}')" class="form-check-input w-45px h-30px" type="checkbox" role="switch" id="switch{{ $row->id }}-{{ $columnName }}" checked>
                <label class="form-check-label" for="switch{{ $row->id }}-{{ $columnName }}"></label>
            </div>

        @elseif ($type === 'yes-no')
            @if ($successValue === true)
                <span>Yes</span>
            @else
                <span>No</span>
            @endif
        @endif
    @else
        @if ($type === 'icons')
            <div class="form-check form-switch">
                <input wire:click="toggle('{{ $row->id }}', '{{ $columnName }}')" class="form-check-input w-45px h-30px" type="checkbox" role="switch" id="switch{{ $row->id }}-{{ $columnName }}">
                <label class="form-check-label" for="switch{{ $row->id }}-{{ $columnName }}"></label>
            </div>
        @elseif ($type === 'yes-no')
            @if ($successValue === false)
                <span>Yes</span>
            @else
                <span>No</span>
            @endif
        @endif
    @endif
@endif
