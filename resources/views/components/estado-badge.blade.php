@props(['estado'])

@php
    $color = match ($estado) {
        'Finalizado' => 'success',
        'Viendo'     => 'primary',
        default      => 'secondary',
    };
@endphp

<span class="badge text-bg-{{ $color }}">{{ $estado }}</span>
