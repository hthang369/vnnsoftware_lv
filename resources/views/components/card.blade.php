<{{$tag}} {{ $attributes->class(['card']) }}>
    @if ($header)
        <x-card-header :header="{{$header}}" :header-tag="{{$headerTag}}"
            :header-bg-variant="{{$headerBgVariant}}"
            :header-border-variant="{{$headerBorderVariant}}"
            :header-text-variant="{{$headerTextVariant}}"
            :class="{{$headerClass}}" />
    @endif

    @if ($imgSrc && $imgTop)
        <x-img :src="{{$imgSrc}}" />
    @endif

    @if (!$noBody)
        <{{$bodyTag}} :class="{{$bodyClass}}"
            :body-text-variant="{{$bodyTextVariant}}"
            :body-border-variant="{{$bodyBorderVariant}}">
    @endif

        <x-card-title :title="{{ $title }}" :title-tag="{{ $titleTag }}" />
        @if ($subTitle)
            <x-card-sub-title :sub-title="{{ $subTitle }}" :sub-title-tag="{{$subTitleTag}}" :sub-title-text-variant="{{$subTitleTextVariant}}" />
        @endif
        {{ $slot }}

    @if (!$noBody)
        </{{$bodyTag}}>
    @endif

    @if ($imgSrc && $imgBottom)
        <x-img :src="{{$imgSrc}}" />
    @endif

    @if ($footer)
        <x-card-footer :footer="{{$footer}}" :footer-tag="{{$footerTag}}"
            :footer-bg-variant="{{$footerBgVariant}}"
            :footer-border-variant="{{$footerBorderVariant}}"
            :footer-text-variant="{{$footerTextVariant}}"
            :class="{{$footerClass}}" />
    @endif
</{{$tag}}>
