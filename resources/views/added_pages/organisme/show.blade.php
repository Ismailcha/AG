<x-default-layout>

    <!-- Set the title -->
    @section('title', 'Organisme Details')

    <!-- Define breadcrumbs -->
    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!-- Display Organisme Details at the top of the page -->
    <!-- <div class="container mt-3">
        <div class="card shadow-lg">
            <div class="row g-0">
                <div class="col-md-4">
                    @if ($organisme->logo)
                        <img src="{{ asset('storage/' . $organisme->logo) }}" alt="Organisme Logo" class="img-fluid rounded-circle" width="1000" height="210">
                    @else
                        <p>Aucun logo .</p>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $organisme->nom }}</h5>
                        <p class="card-text"><strong>Type:</strong> {{ $organisme->type == 1 ? 'Laboratoire' : 'Grossiste' }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $organisme->adress }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $organisme->email }}</p>
                        <p class="card-text"><strong>Telephone:</strong> {{ $organisme->telephone }}</p>
                        <p class="card-text"><strong>ICE:</strong> {{ $organisme->ICE }}</p>
                        <p class="card-text"><strong>Potent:</strong> {{ $organisme->Potent }}</p>
                        <p class="card-text"><strong>RC:</strong> {{ $organisme->RC }}</p>
                    </div>
                </div>
            </div>
        </div> -->












        <div class="app-container container-xxl">
						<!--begin::Main-->
						<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
							<!--begin::Content wrapper-->
							<div class="d-flex flex-column flex-column-fluid">
								<!--begin::Content-->
								<div id="kt_app_content" class="app-content">
									<!--begin::Navbar-->
									<div class="card mb-5 mb-xl-10">
										<div class="card-body pt-9 pb-0">
											<!--begin::Details-->
											<div class="d-flex flex-wrap flex-sm-nowrap">
												<!--begin: Pic-->
												<div class="me-7 mb-4">
													<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
														<img src="{{ asset('storage/' . $organisme->logo) }}" alt="image">
														<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
													</div>
												</div>
												<!--end::Pic-->
												<!--begin::Info-->
												<div class="flex-grow-1">
													<!--begin::Title-->
													<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
														<!--begin::User-->
														<div class="d-flex flex-column">
															<!--begin::Name-->
															<div class="d-flex align-items-center mb-2">
																<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $organisme->nom }}</a>
																<a href="#">
																	<i class="ki-outline ki-verify fs-1 text-primary"></i>
																</a>
															</div>
															<!--end::Name-->
															<!--begin::Info-->
															<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
																<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
																<i class="ki-outline ki-profile-circle fs-4 me-1"></i>Developer</a>
																<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
																<i class="ki-outline ki-geolocation fs-4 me-1"></i>SF, Bay Area</a>
																<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
																<i class="ki-outline ki-sms fs-4"></i>{{ $organisme->email }}</a>
															</div>
															<!--end::Info-->
														</div>
														<!--end::User-->
														<!--begin::Actions-->
														<div class="d-flex my-4">
															<a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
																<i class="ki-outline ki-check fs-3 d-none"></i>
																<!--begin::Indicator label-->
																<span class="indicator-label">Follow</span>
																<!--end::Indicator label-->
																<!--begin::Indicator progress-->
																<span class="indicator-progress">Please wait...
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																<!--end::Indicator progress-->
															</a>
															<a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a>
															<!--begin::Menu-->
															<div class="me-0">
																<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																	<i class="ki-solid ki-dots-horizontal fs-2x"></i>
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
																		<span class="ms-2" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-bs-original-title="Specify a target name for future usage and reference" data-kt-initialized="1">
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
																						<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications">
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
															</div>
															<!--end::Menu-->
														</div>
														<!--end::Actions-->
													</div>
													<!--end::Title-->
													<!--begin::Stats-->
													<div class="d-flex flex-wrap flex-stack">
														<!--begin::Wrapper-->
														<div class="d-flex flex-column flex-grow-1 pe-8">
															<!--begin::Stats-->
															<div class="d-flex flex-wrap">
																<!--begin::Stat-->
																<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																	<!--begin::Number-->
																	<div class="d-flex align-items-center">
																		<i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
																		<div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" data-kt-initialized="1">$4,500</div>
																	</div>
																	<!--end::Number-->
																	<!--begin::Label-->
																	<div class="fw-semibold fs-6 text-gray-400">Earnings</div>
																	<!--end::Label-->
																</div>
																<!--end::Stat-->
																<!--begin::Stat-->
																<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																	<!--begin::Number-->
																	<div class="d-flex align-items-center">
																		<i class="ki-outline ki-arrow-down fs-3 text-danger me-2"></i>
																		<div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="80" data-kt-initialized="1">80</div>
																	</div>
																	<!--end::Number-->
																	<!--begin::Label-->
																	<div class="fw-semibold fs-6 text-gray-400">Projects</div>
																	<!--end::Label-->
																</div>
																<!--end::Stat-->
																<!--begin::Stat-->
																<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																	<!--begin::Number-->
																	<div class="d-flex align-items-center">
																		<i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
																		<div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%" data-kt-initialized="1">%60</div>
																	</div>
																	<!--end::Number-->
																	<!--begin::Label-->
																	<div class="fw-semibold fs-6 text-gray-400">Success Rate</div>
																	<!--end::Label-->
																</div>
																<!--end::Stat-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Progress-->
														<div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
															<div class="d-flex justify-content-between w-100 mt-auto mb-2">
																<span class="fw-semibold fs-6 text-gray-400">Profile Compleation</span>
																<span class="fw-bold fs-6">50%</span>
															</div>
															<div class="h-5px mx-3 w-100 bg-light mb-3">
																<div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
														<!--end::Progress-->
													</div>
													<!--end::Stats-->
												</div>
												<!--end::Info-->
											</div>
											<!--end::Details-->
											<!--begin::Navs-->
											
											<!--begin::Navs-->
										</div>
									</div>
									<!--end::Navbar-->
									<!--begin::details View-->
									<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
										<!--begin::Card header-->
										<div class="card-header cursor-pointer">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Profile Details</h3>
											</div>
											<!--end::Card title-->
											<!--begin::Action-->
											<a href="../../demo53/dist/account/settings.html" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
											<!--end::Action-->
										</div>
										<!--begin::Card header-->
										<!--begin::Card body-->
										<div class="card-body p-9">
											<!--begin::Row-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Full Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800">{{ $organisme->nom }}</span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Type:</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<span class="fw-semibold text-gray-800 fs-6"> {{ $organisme->type == 1 ? 'Laboratoire' : 'Grossiste' }}</span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Address:
												<span class="ms-1" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-bs-original-title="Phone number must be active" data-kt-initialized="1">
													<i class="ki-outline ki-information fs-7"></i>
												</span></label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 d-flex align-items-center">
													<span class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $organisme->adress }}</span>
													<span class="badge badge-success" style="margin-left:20px;">Verified</span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Email:</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $organisme->email  }}</a>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Telephone:
												<span class="ms-1" data-bs-toggle="tooltip" aria-label="Country of origination" data-bs-original-title="Country of origination" data-kt-initialized="1">
													<i class="ki-outline ki-information fs-7"></i>
												</span></label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="   fw-bold fs-6 text-gray-800 me-2">{{ $organisme->telephone }}</span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">ICE:</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800">{{ $organisme->ICE }}</span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-10">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Potent:</label>
												<!--begin::Label-->
												<!--begin::Label-->
												<div class="col-lg-8">
													<span class="fw-semibold fs-6 text-gray-800">{{ $organisme->Potent }}</span>
												</div>
												<!--begin::Label-->
											</div>
                                            <div class="row mb-10">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">RC:</label>
												<!--begin::Label-->
												<!--begin::Label-->
												<div class="col-lg-8">
													<span class="fw-semibold fs-6 text-gray-800">{{ $organisme->RC }}</span>
												</div>
												<!--begin::Label-->
											</div>
											<!--end::Input group-->
											<!--begin::Notice-->
											
											<!--end::Notice-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::details View-->
									








































        <!-- Back Button -->
        <a href="{{ route('organismes.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>

    <style>
        .card {
            border: none;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .img-fluid {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>

</x-default-layout>