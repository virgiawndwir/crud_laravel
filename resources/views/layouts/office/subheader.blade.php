<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div clssssass="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                {{ $title }}
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>

                @for($i = 0; $i < @count($breadcrumbs); $i++)
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ $breadcrumbs[$i]['link'] }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                {{ $breadcrumbs[$i]['text'] }}
                            </span>
                        </a>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
</div>
<!-- END: Subheader -->