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
                                    <span class="menu-icon">
                                        <img src="{{ asset('assets/media/icons/duotune/general/gen001.svg') }}" alt="Example Icon">
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
                    
                        <!--begin:Menu item 2 (Produits)-->
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('produit.liste') ? 'active' : '' }}" href="{{ route('produit.index') }}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <img src="{{ asset('assets/media/icons/duotune/ecommerce/ecm004.svg') }}" alt="Example Icon">
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
                                    <span class="menu-icon">
                                        <img src="{{ asset('assets/media/icons/duotune/communication/com013.svg') }}" alt="Example Icon">
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
                                    <span class="menu-icon">
                                        <img src="{{ asset('assets/media/icons/duotune/communication/com014.svg') }}" alt="Example Icon">
                                    </span>
                                    <span class="menu-title">organismes</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                        </div>
                        <!--end:Menu item 4-->
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('fifth.route') ? 'active' : '' }}" href="{{ route('offers.index') }}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <img src="{{ asset('assets/media/icons/duotune/ecommerce/ecm004.svg') }}" alt="Example Icon">
                                    </span>
                                    <span class="menu-title">Offres</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                            </a>
                        </div>
                        <!--end:Menu item 5-->
                    
                        <!--begin:Menu item 6 (Sixth Item)-->
                        <div data-kt-menu-placement="bottom-start" data-kt-menu-offset="-400,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <a class="menu-link {{ request()->routeIs('user.commandes') ? 'active' : '' }}" href="{{ route('user.commandes') }}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <img src="{{ asset('assets/media/icons/duotune/ecommerce/ecm004.svg') }}" alt="Example Icon">
                                    </span>
                                    <span class="menu-title">Commandes</span>
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
                <!--begin::User menu-->
                {{-- <div class="app-navbar-item me-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="ki-outline ki-user fs-2"></i>
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="assets/media/avatars/300-5.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">Max Smith
                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="../../demo53/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="../../demo53/dist/apps/projects/list.html" class="menu-link px-5">
                                <span class="menu-text">My Projects</span>
                                <span class="menu-badge">
                                    <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                </span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title">My Subscription</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo53/dist/account/referrals.html" class="menu-link px-5">Referrals</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo53/dist/account/billing.html" class="menu-link px-5">Billing</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo53/dist/account/statements.html" class="menu-link px-5">Payments</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo53/dist/account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
                                    <span class="ms-2 lh-0" data-bs-toggle="tooltip" title="View your statements">
                                        <i class="ki-outline ki-information-5 fs-5"></i>
                                    </span></a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3">
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                            <span class="form-check-label text-muted fs-7">Notifications</span>
                                        </label>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu sub-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="../../demo53/dist/account/statements.html" class="menu-link px-5">My Statements</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title position-relative">Mode
                                <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                    <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                    <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                                </span></span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-outline ki-night-day fs-2"></i>
                                        </span>
                                        <span class="menu-title">Light</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-outline ki-moon fs-2"></i>
                                        </span>
                                        <span class="menu-title">Dark</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-outline ki-screen fs-2"></i>
                                        </span>
                                        <span class="menu-title">System</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title position-relative">Language
                                <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                                <img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt="" /></span></span>
                            </a>
                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo53/dist/account/settings.html" class="menu-link d-flex px-5 active">
                                    <span class="symbol symbol-20px me-4">
                                        <img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
                                    </span>English</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo53/dist/account/settings.html" class="menu-link d-flex px-5">
                                    <span class="symbol symbol-20px me-4">
                                        <img class="rounded-1" src="assets/media/flags/spain.svg" alt="" />
                                    </span>Spanish</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo53/dist/account/settings.html" class="menu-link d-flex px-5">
                                    <span class="symbol symbol-20px me-4">
                                        <img class="rounded-1" src="assets/media/flags/germany.svg" alt="" />
                                    </span>German</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo53/dist/account/settings.html" class="menu-link d-flex px-5">
                                    <span class="symbol symbol-20px me-4">
                                        <img class="rounded-1" src="assets/media/flags/japan.svg" alt="" />
                                    </span>Japanese</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo53/dist/account/settings.html" class="menu-link d-flex px-5">
                                    <span class="symbol symbol-20px me-4">
                                        <img class="rounded-1" src="assets/media/flags/france.svg" alt="" />
                                    </span>French</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu sub-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5 my-1">
                            <a href="../../demo53/dist/account/settings.html" class="menu-link px-5">Account Settings</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="../../demo53/dist/authentication/layouts/corporate/sign-in.html" class="menu-link px-5">Sign Out</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div> --}}
                <!--end::User menu-->
                <!--begin::Chat-->
                {{-- <div class="app-navbar-item me-3">
                    <a href="#" class="d-flex align-items-center" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <button class="btn btn-icon btn-body position-relative btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px">
                            <i class="ki-outline ki-messages fs-2"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge badge-circle badge-sm badge-danger min-w-15px min-h-15px ms-n1 fs-8" style="margin-top: 5px;">5</span>
                        </button>
                        <!--begin::Chat menu-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-lg-400px" data-kt-menu="true" data-kt-menu-close="#kt_menu_shopping_cart_close" data-kt-menu-toggle="#kt_menu_shopping_cart_toggle">
                            <!--begin::Messenger-->
                            <div class="card card-flush">
                                <!--begin::Card header-->
                                <div class="card-header w-100 py-5 mb-4">
                                    <!--begin::Title-->
                                    <h3 class="card-title text-gray-900 fw-bold">Shopping Cart</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-1 pe-4">
                                    <!--begin::Items-->
                                    <div class="hover-scroll-y py-0 h-350px pe-4">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column me-3 flex-grow-1">
                                                <!--begin::Section-->
                                                <div class="mb-3">
                                                    <a href="../../demo53/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">Iblender</a>
                                                    <span class="text-gray-400 fw-semibold d-block">The best kitchen gadget in 2022</span>
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bold text-gray-800 fs-6">$ 350</span>
                                                    <span class="text-muted mx-2">for</span>
                                                    <span class="fw-bold text-gray-800 fs-6 me-3">5</span>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                                        <i class="ki-outline ki-minus fs-4"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                                        <i class="ki-outline ki-plus fs-4"></i>
                                                    </a>
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Pic-->
                                            <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                                                <img src="assets/media/stock/600x400/img-1.jpg" alt="" />
                                            </div>
                                            <!--end::Pic-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Separator-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column me-3 flex-grow-1">
                                                <!--begin::Section-->
                                                <div class="mb-3">
                                                    <a href="../../demo53/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">SmartCleaner</a>
                                                    <span class="text-gray-400 fw-semibold d-block">Smart tool for cooking</span>
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bold text-gray-800 fs-6">$ 650</span>
                                                    <span class="text-muted mx-2">for</span>
                                                    <span class="fw-bold text-gray-800 fs-6 me-3">4</span>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                                        <i class="ki-outline ki-minus fs-4"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                                        <i class="ki-outline ki-plus fs-4"></i>
                                                    </a>
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Pic-->
                                            <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                                                <img src="assets/media/stock/600x400/img-3.jpg" alt="" />
                                            </div>
                                            <!--end::Pic-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Separator-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column me-3 flex-grow-1">
                                                <!--begin::Section-->
                                                <div class="mb-3">
                                                    <a href="../../demo53/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">CameraMaxr</a>
                                                    <span class="text-gray-400 fw-semibold d-block">Professional camera for edge</span>
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bold text-gray-800 fs-6">$ 150</span>
                                                    <span class="text-muted mx-2">for</span>
                                                    <span class="fw-bold text-gray-800 fs-6 me-3">3</span>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                                        <i class="ki-outline ki-minus fs-4"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                                        <i class="ki-outline ki-plus fs-4"></i>
                                                    </a>
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Pic-->
                                            <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                                                <img src="assets/media/stock/600x400/img-8.jpg" alt="" />
                                            </div>
                                            <!--end::Pic-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Separator-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column me-3 flex-grow-1">
                                                <!--begin::Section-->
                                                <div class="mb-3">
                                                    <a href="../../demo53/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">$D Printer</a>
                                                    <span class="text-gray-400 fw-semibold d-block">Manfactoring unique objekts</span>
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bold text-gray-800 fs-6">$ 1450</span>
                                                    <span class="text-muted mx-2">for</span>
                                                    <span class="fw-bold text-gray-800 fs-6 me-3">7</span>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                                        <i class="ki-outline ki-minus fs-4"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                                        <i class="ki-outline ki-plus fs-4"></i>
                                                    </a>
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Pic-->
                                            <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                                                <img src="assets/media/stock/600x400/img-26.jpg" alt="" />
                                            </div>
                                            <!--end::Pic-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Separator-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column me-3 flex-grow-1">
                                                <!--begin::Section-->
                                                <div class="mb-3">
                                                    <a href="../../demo53/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">MotionWire</a>
                                                    <span class="text-gray-400 fw-semibold d-block">Perfect animation tool</span>
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bold text-gray-800 fs-6">$ 650</span>
                                                    <span class="text-muted mx-2">for</span>
                                                    <span class="fw-bold text-gray-800 fs-6 me-3">7</span>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                                        <i class="ki-outline ki-minus fs-4"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                                        <i class="ki-outline ki-plus fs-4"></i>
                                                    </a>
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Pic-->
                                            <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                                                <img src="assets/media/stock/600x400/img-21.jpg" alt="" />
                                            </div>
                                            <!--end::Pic-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Separator-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column me-3 flex-grow-1">
                                                <!--begin::Section-->
                                                <div class="mb-3">
                                                    <a href="../../demo53/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">Samsung</a>
                                                    <span class="text-gray-400 fw-semibold d-block">Profile info,Timeline etc</span>
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bold text-gray-800 fs-6">$ 720</span>
                                                    <span class="text-muted mx-2">for</span>
                                                    <span class="fw-bold text-gray-800 fs-6 me-3">6</span>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                                        <i class="ki-outline ki-minus fs-4"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                                        <i class="ki-outline ki-plus fs-4"></i>
                                                    </a>
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Pic-->
                                            <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                                                <img src="assets/media/stock/600x400/img-34.jpg" alt="" />
                                            </div>
                                            <!--end::Pic-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Separator-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column me-3 flex-grow-1">
                                                <!--begin::Section-->
                                                <div class="mb-3">
                                                    <a href="../../demo53/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">$D Printer</a>
                                                    <span class="text-gray-400 fw-semibold d-block">Manfactoring unique objekts</span>
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bold text-gray-800 fs-6">$ 430</span>
                                                    <span class="text-muted mx-2">for</span>
                                                    <span class="fw-bold text-gray-800 fs-6 me-3">8</span>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                                                        <i class="ki-outline ki-minus fs-4"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                                                        <i class="ki-outline ki-plus fs-4"></i>
                                                    </a>
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Pic-->
                                            <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                                                <img src="assets/media/stock/600x400/img-27.jpg" alt="" />
                                            </div>
                                            <!--end::Pic-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer py-5">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <span class="fw-bold text-gray-600">Total</span>
                                        <span class="text-gray-700 fw-bolder fs-6">$1,800.00</span>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <span class="fw-bold text-gray-600">Sub total</span>
                                        <span class="text-success fw-bolder fs-5">$1,800.00</span>
                                    </div>
                                    <!--end::Item-->
                                    <!--end::Action-->
                                    <div class="d-flex justify-content-end mt-5">
                                        <a href="#" class="btn btn-sm btn-primary justify-content-end fw-bold">Pleace Order</a>
                                    </div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Card footer-->
                            </div>
                            <!--end::Messenger-->
                        </div>
                        <!--end::Chat menu-->
                    </a>
                </div> --}}
                <!--end::Chat-->
                <!--begin::My apps links-->
                {{-- <div class="app-navbar-item me-3">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="ki-outline ki-element-11 fs-2"></i>
                    </div>
                    <!--begin::My apps-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-350px" data-kt-menu="true">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">My Apps</div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n3" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-end">
                                        <i class="ki-outline ki-setting-3 fs-2"></i>
                                    </button>
                                    <!--begin::Menu 3-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                        <!--begin::Heading-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Create Invoice</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link flex-stack px-3">Create Payment
                                            <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                                <i class="ki-outline ki-information fs-6"></i>
                                            </span></a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Generate Bill</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">Subscription</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Plans</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Billing</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Statements</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator my-2"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3">
                                                        <!--begin::Switch-->
                                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                            <!--end::Input-->
                                                            <!--end::Label-->
                                                            <span class="form-check-label text-muted fs-6">Recuring</span>
                                                            <!--end::Label-->
                                                        </label>
                                                        <!--end::Switch-->
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-1">
                                            <a href="#" class="menu-link px-3">Settings</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 3-->
                                    <!--end::Menu-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-5">
                                <!--begin::Scroll-->
                                <div class="mh-450px scroll-y me-n5 pe-5">
                                    <!--begin::Row-->
                                    <div class="row g-2">
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/amazon.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">AWS</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/angular-icon-1.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">AngularJS</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/atica.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Atica</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/beats-electronics.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Music</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/codeigniter.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Codeigniter</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/bootstrap-4.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Bootstrap</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/google-tag-manager.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">GTM</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/disqus.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Disqus</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/dribbble-icon-1.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Dribble</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/google-play-store.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Play Store</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/google-podcasts.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Podcasts</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/figma-1.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Figma</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/github.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Github</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/gitlab.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Gitlab</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Instagram</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="assets/media/svg/brand-logos/pinterest-p.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Pinterest</span>
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::My apps-->
                    <!--end::Menu wrapper-->
                </div> --}}
                <!--end::My apps links-->
                <!--begin::Action-->
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