<section {{ $attributes }}>
    <div class="{{ $wrapper }}">
        <x-section-title :title="$title" />

        <div class="section-body">{{ $slot }}</div>
    </div>
</section>
