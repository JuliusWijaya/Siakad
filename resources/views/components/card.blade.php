@props(['title'])
<div {{ $attributes->class(['ml-5']) }}>
    <div class="card">
        <div class="card-body">
            <div {{ $title->attributes->class(['card-title']) }}>{{ $title }}</div>
            {{ $slot }}
        </div>
    </div>
</div>