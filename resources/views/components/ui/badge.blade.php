@props([
    'color' => 'primary'
])

<span class="badge bg-{{ $color }}">
    {{ $slot }}
</span>