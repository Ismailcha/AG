<!--begin:Dashboards menu-->
<div class="menu-active-bg pt-1 pb-3 px-3 py-lg-6 px-lg-6" data-kt-menu-dismiss="true">
    <!--begin:Row-->
    <div class="row">
        <!--begin:Col-->
        <div class="col-lg-7">
            <!--begin:Row-->
            <div class="row">
                <!--begin:Col-->
                <div class="col-lg-6 mb-3">
                    <!--begin:Heading-->
                    <h4 class="fs-6 fs-lg-4 text-gray-800 fw-bold mt-3 mb-3 ms-4">Organismes</h4>
                    <!--end:Heading-->
                    <!--begin:Menu item-->
                    <div class="menu-item p-0 m-0">
                        <!--begin:Menu link-->
                        {{-- <a href="{{ route('dashboard') }}" class="menu-link">
							<span class="menu-bullet">
								<span class="bullet bullet-dot bg-gray-300i h-6px w-6px"></span>
							</span>
							<span class="menu-title">Light Sidebar</span>
						</a> --}}
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item p-0 m-0">
                        <!--begin:Menu link-->
                        {{-- <a href="{{ route('dashboard') }}" class="menu-link">
							<span class="menu-bullet">
								<span class="bullet bullet-dot bg-gray-300i h-6px w-6px"></span>
							</span>
							<span class="menu-title">Dark Sidebar</span>
						</a> --}}
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item p-0 m-0">
                        <!--begin:Menu link-->
                        {{-- <a href="{{ route('dashboard') }}" class="menu-link">
							<span class="menu-bullet">
								<span class="bullet bullet-dot bg-gray-300i h-6px w-6px"></span>
							</span>
							<span class="menu-title">Light Header</span>
						</a> --}}
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item p-0 m-0">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                            href="{{ route('categories.index') }}">
                            <span class="menu-title">Liste des categories</span>
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none"
                                    d="M16.803,18.615h-4.535c-1,0-1.814-0.812-1.814-1.812v-4.535c0-1.002,0.814-1.814,1.814-1.814h4.535c1.001,0,1.813,0.812,1.813,1.814v4.535C18.616,17.803,17.804,18.615,16.803,18.615zM17.71,12.268c0-0.502-0.405-0.906-0.907-0.906h-4.535c-0.501,0-0.906,0.404-0.906,0.906v4.535c0,0.502,0.405,0.906,0.906,0.906h4.535c0.502,0,0.907-0.404,0.907-0.906V12.268z M16.803,9.546h-4.535c-1,0-1.814-0.812-1.814-1.814V3.198c0-1.002,0.814-1.814,1.814-1.814h4.535c1.001,0,1.813,0.812,1.813,1.814v4.534C18.616,8.734,17.804,9.546,16.803,9.546zM17.71,3.198c0-0.501-0.405-0.907-0.907-0.907h-4.535c-0.501,0-0.906,0.406-0.906,0.907v4.534c0,0.501,0.405,0.908,0.906,0.908h4.535c0.502,0,0.907-0.406,0.907-0.908V3.198z M7.733,18.615H3.198c-1.002,0-1.814-0.812-1.814-1.812v-4.535c0-1.002,0.812-1.814,1.814-1.814h4.535c1.002,0,1.814,0.812,1.814,1.814v4.535C9.547,17.803,8.735,18.615,7.733,18.615zM8.64,12.268c0-0.502-0.406-0.906-0.907-0.906H3.198c-0.501,0-0.907,0.404-0.907,0.906v4.535c0,0.502,0.406,0.906,0.907,0.906h4.535c0.501,0,0.907-0.404,0.907-0.906V12.268z M7.733,9.546H3.198c-1.002,0-1.814-0.812-1.814-1.814V3.198c0-1.002,0.812-1.814,1.814-1.814h4.535c1.002,0,1.814,0.812,1.814,1.814v4.534C9.547,8.734,8.735,9.546,7.733,9.546z M8.64,3.198c0-0.501-0.406-0.907-0.907-0.907H3.198c-0.501,0-0.907,0.406-0.907,0.907v4.534c0,0.501,0.406,0.908,0.907,0.908h4.535c0.501,0,0.907-0.406,0.907-0.908V3.198z">
                                </path>
                            </svg>
                        </a>
                        <a class="menu-link {{ request()->routeIs('items.index') ? 'active' : '' }}"
                            href="{{ route('items.index') }}">
                            <span class="menu-title">Vente Achat</span>
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none"
                                    d="M16.803,18.615h-4.535c-1,0-1.814-0.812-1.814-1.812v-4.535c0-1.002,0.814-1.814,1.814-1.814h4.535c1.001,0,1.813,0.812,1.813,1.814v4.535C18.616,17.803,17.804,18.615,16.803,18.615zM17.71,12.268c0-0.502-0.405-0.906-0.907-0.906h-4.535c-0.501,0-0.906,0.404-0.906,0.906v4.535c0,0.502,0.405,0.906,0.906,0.906h4.535c0.502,0,0.907-0.404,0.907-0.906V12.268z M16.803,9.546h-4.535c-1,0-1.814-0.812-1.814-1.814V3.198c0-1.002,0.814-1.814,1.814-1.814h4.535c1.001,0,1.813,0.812,1.813,1.814v4.534C18.616,8.734,17.804,9.546,16.803,9.546zM17.71,3.198c0-0.501-0.405-0.907-0.907-0.907h-4.535c-0.501,0-0.906,0.406-0.906,0.907v4.534c0,0.501,0.405,0.908,0.906,0.908h4.535c0.502,0,0.907-0.406,0.907-0.908V3.198z M7.733,18.615H3.198c-1.002,0-1.814-0.812-1.814-1.812v-4.535c0-1.002,0.812-1.814,1.814-1.814h4.535c1.002,0,1.814,0.812,1.814,1.814v4.535C9.547,17.803,8.735,18.615,7.733,18.615zM8.64,12.268c0-0.502-0.406-0.906-0.907-0.906H3.198c-0.501,0-0.907,0.404-0.907,0.906v4.535c0,0.502,0.406,0.906,0.907,0.906h4.535c0.501,0,0.907-0.404,0.907-0.906V12.268z M7.733,9.546H3.198c-1.002,0-1.814-0.812-1.814-1.814V3.198c0-1.002,0.812-1.814,1.814-1.814h4.535c1.002,0,1.814,0.812,1.814,1.814v4.534C9.547,8.734,8.735,9.546,7.733,9.546z M8.64,3.198c0-0.501-0.406-0.907-0.907-0.907H3.198c-0.501,0-0.907,0.406-0.907,0.907v4.534c0,0.501,0.406,0.908,0.907,0.908h4.535c0.501,0,0.907-0.406,0.907-0.908V3.198z">
                                </path>
                            </svg>
                        </a>
                        {{-- <a class="menu-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                            href="{{ route('categories.index') }}">
                            <span class="menu-title">Liste des Specialiter</span>
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none"
                                    d="M16.852,5.051h-4.018c0.131-0.225,0.211-0.482,0.211-0.761V3.528c0-0.841-0.682-1.522-1.521-1.522H8.478c-0.841,0-1.523,0.682-1.523,1.522V4.29c0,0.279,0.081,0.537,0.211,0.761H3.148c-0.841,0-1.522,0.682-1.522,1.523v9.897c0,0.842,0.682,1.523,1.522,1.523h13.704c0.842,0,1.523-0.682,1.523-1.523V6.574C18.375,5.733,17.693,5.051,16.852,5.051zM7.716,3.528c0-0.42,0.341-0.761,0.762-0.761h3.045c0.42,0,0.762,0.341,0.762,0.761V4.29c0,0.421-0.342,0.761-0.762,0.761H8.478c-0.42,0-0.762-0.34-0.762-0.761V3.528z M17.615,16.471c0,0.422-0.342,0.762-0.764,0.762H3.148c-0.42,0-0.761-0.34-0.761-0.762V9.62h15.228V16.471z M17.615,8.858H2.387V6.574c0-0.421,0.341-0.761,0.761-0.761h13.704c0.422,0,0.764,0.34,0.764,0.761V8.858z">
                                </path>
                            </svg>
                        </a> --}}
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Col-->
                <!--begin:Col-->
                <div class="col-lg-6 mb-3">
                    <!--begin:Heading-->
                    <h4 class="fs-6 fs-lg-4 text-gray-800 fw-bold mt-3 mb-3 ms-4">Techniciens</h4>
                    <!--end:Heading-->
                    <!--begin:Menu item-->
                    <div class="menu-item p-0 m-0">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('candidates.index') ? 'active' : '' }}"
                            href="{{ route('candidates.index') }}">
                            <span class="menu-title">Liste des Techniciens</span>
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <circle fill="none" cx="7.884" cy="11.397" r="0.699"></circle>
                                <circle fill="none" cx="12.076" cy="11.397" r="0.699"></circle>
                                <path fill="none"
                                    d="M17.685,5.808c-0.257,0-0.502,0.053-0.73,0.139C16.64,2.737,13.649,0.219,10,0.219c-3.649,0-6.64,2.518-6.955,5.728c-0.228-0.086-0.473-0.139-0.73-0.139c-1.153,0-2.096,0.943-2.096,2.096v3.493c0,1.153,0.943,2.096,2.096,2.096c0.28,0,0.547-0.058,0.792-0.158c0.113,1.088,0.304,1.795,0.585,2.254c0.539,0.834,4.139,4.192,6.288,4.192c2.149,0,5.751-3.361,6.272-4.167c0.292-0.476,0.488-1.196,0.602-2.296c0.255,0.112,0.536,0.175,0.831,0.175c1.153,0,2.096-0.943,2.096-2.096V7.904C19.781,6.751,18.838,5.808,17.685,5.808zM15.078,14.855c-0.482,0.746-3.715,3.529-5.099,3.529s-4.616-2.783-5.097-3.525c-0.319-0.521-0.444-1.919-0.489-3.297c0.004-0.055,0.017-0.108,0.017-0.164V8.603c0-0.04,0.005-0.078,0.006-0.118C4.779,8.56,5.156,8.603,5.545,8.603c1.994,0,3.706-1.037,4.455-2.519c0.749,1.482,2.461,2.519,4.455,2.519c0.389,0,0.766-0.043,1.128-0.118c0.001,0.039,0.006,0.078,0.006,0.118c0,0.077-0.008,0.152-0.012,0.229C15.598,10.276,15.641,13.938,15.078,14.855z">
                                </path>
                            </svg>
                        </a>

                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item p-0 m-0">
                        <!--begin:Menu link-->
                        {{-- <a href="{{ route('dashboard') }}" class="menu-link">
							<span class="menu-bullet">
								<span class="bullet bullet-dot bg-gray-300i h-6px w-6px"></span>
							</span>
							<span class="menu-title">SaaS</span>
						</a> --}}
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item p-0 m-0">
                        <!--begin:Menu link-->
                        {{-- <a href="{{ route('dashboard') }}" class="menu-link">
							<span class="menu-bullet">
								<span class="bullet bullet-dot bg-gray-300i h-6px w-6px"></span>
							</span>
							<span class="menu-title">Accounting</span>
						</a> --}}
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item p-0 m-0">
                        <!--begin:Menu link-->
                        {{-- <a href="{{ route('dashboard') }}" class="menu-link">
							<span class="menu-bullet">
								<span class="bullet bullet-dot bg-gray-300i h-6px w-6px"></span>
							</span>
							<span class="menu-title">Extended</span>
						</a> --}}
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item p-0 m-0">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('organismes.index') ? 'active' : '' }}"
                            href="{{ route('organismes.index') }}">
                            <span class="menu-title">Liste des organismes</span>
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none"
                                    d="M10.001,9.658c-2.567,0-4.66-2.089-4.66-4.659c0-2.567,2.092-4.657,4.66-4.657s4.657,2.09,4.657,4.657
								C14.658,7.569,12.569,9.658,10.001,9.658z M10.001,1.8c-1.765,0-3.202,1.437-3.202,3.2c0,1.766,1.437,3.202,3.202,3.202
								c1.765,0,3.199-1.436,3.199-3.202C13.201,3.236,11.766,1.8,10.001,1.8z">
                                </path>
                                <path fill="none"
                                    d="M9.939,19.658c-0.091,0-0.179-0.017-0.268-0.051l-7.09-2.803c-0.276-0.108-0.461-0.379-0.461-0.678
								c0-4.343,3.535-7.876,7.881-7.876c4.343,0,7.878,3.533,7.878,7.876c0,0.302-0.182,0.572-0.464,0.68l-7.213,2.801
								C10.118,19.64,10.03,19.658,9.939,19.658z M3.597,15.639l6.344,2.507l6.464-2.512c-0.253-3.312-3.029-5.927-6.404-5.927
								C6.623,9.707,3.848,12.326,3.597,15.639z">
                                </path>
                                <path fill="none"
                                    d="M9.939,19.658c0,0-0.003,0-0.006,0c-0.347-0.003-0.646-0.253-0.709-0.596L7.462,9.567
								C7.389,9.172,7.65,8.79,8.046,8.718C8.442,8.643,8.82,8.906,8.894,9.301l1.076,5.796l1.158-5.741
								c0.08-0.394,0.461-0.655,0.86-0.569c0.396,0.08,0.649,0.464,0.569,0.859l-1.904,9.427C10.585,19.413,10.286,19.658,9.939,19.658z">
                                </path>
                            </svg>
                        </a>


                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Col-->
            </div>
            <!--end:Row-->
            {{-- <div class="separator separator-dashed mx-lg-5 mt-2 mb-6"></div>
			<!--begin:Layout Builder-->
			<div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-2 mb-5 mb-lg-0 mx-lg-5">
				<div class="d-flex flex-column me-5">
					<div class="fs-6 fw-bold text-gray-800">Layout Builder</div>
					<div class="fs-7 fw-semibold text-muted">Customize, preview and export</div>
				</div>
				<a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary fw-bold">Try Builder</a>
			</div> --}}
            <!--end:Layout Builder-->
        </div>
        <!--end:Col-->
        <!--begin:Col-->
        <div class="col-lg-5 mb-3 py-lg-3 pe-lg-8 d-flex align-items-center">
            <img src="{{ image('stock/900x600/45.jpg') }}" class="rounded mw-100" alt="" />
        </div>
        <!--end:Col-->
    </div>
    <!--end:Row-->
</div>
<!--end:Dashboards menu-->
