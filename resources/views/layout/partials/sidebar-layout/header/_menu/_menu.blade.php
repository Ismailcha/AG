<div id="kt_app_header" class="app-header align-items-stretch" style="background-color: white;">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
        <!--begin::Header-->
        <div class="d-flex align-items-center justify-content-between flex-row-fluid" id="kt_app_header_wrapper">
            <!--begin::Header logo-->
            <div class="app-header-logo d-flex align-items-center">
                <!--begin::Header mobile toggle-->
                <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
                    <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
                        <i class="ki-outline ki-abstract-14 fs-2"></i>
                    </div>
                </div>
                <!--end::Header mobile toggle-->
                <!--begin::Logo image-->
                <a href="../../demo53/dist/index.html" class="me-5 me-lg-9">
                    <img alt="Logo" src="/assets/media/logos/custom_1.svg" class="h-25px h-lg-30px theme-light-show" />
                    <img alt="Logo" src="assets/media/logos/demo53-dark.svg" class="h-25px h-lg-30px theme-dark-show" />
                </a>
                <!--end::Logo image-->
            </div>
            <!--end::Header logo-->
            <!--begin::Menu wrapper-->
            <div class="d-flex align-items-stretch" id="kt_app_header_menu_wrapper">
                <!--begin::Menu holder-->
                <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_menu_wrapper'}">
                    <!--begin::Menu-->
                    <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-600 menu-state-primary menu-arrow-gray-400 fw-semibold fw-semibold fs-6 align-items-stretch my-5 my-lg-0 px-2 px-lg-0" id="#kt_app_header_menu" data-kt-menu="true">
                        <!--begin:Menu item 1-->
                        
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-250,0" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <a href="{{ route('dashboard') }}">
                                <span class="menu-link">
                                    <span class="menu-icon ki-outline ki-home fs-2x text-primary">
                                        <!--<img src="{{ asset('assets/media/icons/duotune/general/gen001.svg') }}" alt="Example Icon">-->
                                    </span>
                                    <span class="menu-title">Dashboards</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item 1-->
                        @if (Auth::user()->role == 0|| Auth::user()->role == 2)
                        <!--begin:Menu item 2 (Produits)-->
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('produit.liste') ? 'active' : '' }}" href="{{ route('produit.index') }}">
                                <span class="menu-link">
                                    <span class="menu-icon ki-outline ki-shop fs-2x text-primary">
                                        <!--<img src="{{ asset('assets/media/icons/duotune/ecommerce/ecm004.svg') }}" alt="Example Icon">-->
                                    </span>
                                    <span class="menu-title">Produits</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                        </div>
                        <!--end:Menu item 2-->
                    
                        <!--begin:Menu item 3 (Copy of Produits)-->
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('produit.liste') ? 'active' : '' }}" href="{{ route('candidates.index') }}">
                                <span class="menu-link">
                                    <span class="menu-icon ki-outline ki-address-book fs-2x text-primary">
                                        <!--<img src="{{ asset('assets/media/icons/duotune/communication/com013.svg') }}" alt="Example Icon">-->
                                    </span>
                                    <span class="menu-title">techniciens</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                        </div>
                        <!--end:Menu item 3-->
                    
                        <!--begin:Menu item 4 (Another Item)-->
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('another.route') ? 'active' : '' }}" href="{{ route('organismes.index') }}">
                                <span class="menu-link">
                                    <span class="menu-icon ki-outline ki-delivery-door fs-2x text-primary">
                                        <!--<img src="{{ asset('assets/media/icons/duotune/communication/com014.svg') }}" alt="Example Icon">-->
                                    </span>
                                    <span class="menu-title">organismes</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                        </div>
                        @endif
                        <!--end:Menu item 4-->
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('fifth.route') ? 'active' : '' }}" href="{{ route('offers.index') }}">
                                <span class="menu-link">
                                    <span class="menu-icon ki-outline ki-discount fs-2x text-primary">
                                        <!--<img src="{{ asset('assets/media/icons/duotune/ecommerce/ecm003.svg') }}" alt="Example Icon">-->
                                    </span>
                                    <span class="menu-title">Offres</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                        </div>
                        <!--end:Menu item 5-->
                    
                        <!--begin:Menu item 6 (Sixth Item)-->
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('user.commandes')  }}" href="{{ route('user.commandes') }}">
                                <span class="menu-link">
                                    <span class="menu-icon ki-outline ki-delivery-3 fs-2x text-primary">
                                        <!--<img src="{{ asset('assets/media/icons/duotune/ecommerce/ecm005.svg') }}" alt="Example Icon">-->
                                    </span>
                                    <span class="menu-title">Commandes</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                            
                        </div>
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('items.index') ? 'active' : '' }}"
                                href="{{ route('items.index') }}">
                                    <span class="menu-icon ki-outline ki-delivery-3 fs-2x text-primary">
                                        <!--<img src="{{ asset('assets/media/icons/duotune/ecommerce/ecm001.svg') }}" alt="Example Icon">-->
                                    </span>
                                    <span class="menu-title">Achat & Vente</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                            
                        </div>
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('user.commandes')  }}" href="{{ route('user.commandes') }}">
                                <span class="menu-link">
                                    <span class="menu-icon ki-outline ki-delivery-3 fs-2x text-primary">
                                        <!--<img src="{{ asset('assets/media/icons/duotune/ecommerce/ecm005.svg') }}" alt="Example Icon">-->
                                    </span>
                                    <span class="menu-title">Recrutement</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                            
                        </div>
                    </div>
                    
                    
                    
                    <!--end::Menu-->
                </div>
                
                <!--end::Menu holder-->
            </div>
            
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                
                <div class="app-navbar-item ms-2">
                    <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            @if (Auth::user()->profile_photo_url)
                                <img src="{{ \Auth::user()->profile_photo_url }}" class="rounded-3" alt="user" />
                            @else
                                <div
                                    class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', Auth::user()->name) }}">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        @include('partials/menus/_user-account-menu')
                        <!--end::Menu wrapper-->
                    </div>
                </div>
                <!--end::Action-->
                <!--begin::Sidebar menu toggle-->
                <!--end::Sidebar menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header-->
    </div>
    <!--end::Header container-->
</div>