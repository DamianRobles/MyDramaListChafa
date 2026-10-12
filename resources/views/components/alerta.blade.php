@props(['tipo' => 'success'])

<div class="alert alert-{{ $tipo }}">
    {{ $slot }}
</div>
