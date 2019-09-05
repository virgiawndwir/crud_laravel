<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div
            id="m_ver_menu"
            class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
            data-menu-vertical="true"
            data-menu-scrollable="true" data-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Master
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item " aria-haspopup="true" data-redirect="true">
                <a href="{{ route('user.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-user-ok"></i>
                    <span class="m-menu__link-text">
                        Pengguna
                    </span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true" data-redirect="true">
                <a href="{{ route('product.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-user"></i>
                    <span class="m-menu__link-text">
                        Product
                    </span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true" data-redirect="true">
                <a href="{{ route('barang.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-graphic"></i>
                    <span class="m-menu__link-text">
                        Barang
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->