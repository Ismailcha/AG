<x-auth-layout>

    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="{{ route('login') }}"
        action="{{ route('register') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">
                Création de compte
            </h1>
            <!--end::Title-->

            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">

            </div>
            <!--end::Subtitle--->
        </div>
        <!--begin::Heading-->

        <!-- ... Other form fields ... -->

        <!--begin::Separator-->
        <div class="separator separator-content my-14">
            <span class="w-125px text-gray-500 fw-semibold fs-7">Ou avec email</span>
        </div>
        <!--end::Separator-->

        <!-- ... Other form fields ... -->

        <!--begin::Input group-->
        <div class="fv-row mb-8">
            <!--begin::Role Select-->
            <select name="role" id="role" class="form-control bg-transparent">
                <option value="1">Client</option>
                <option value="2">Organisme</option>
            </select>
            <!--end::Role Select-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Name-->
            <input type="text" placeholder="Nom" name="name" autocomplete="off"
                class="form-control bg-transparent" />
            <!--end::Name-->
        </div>
        <!--end::Input group--->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Telephone-->
            <input type="tel" placeholder="Telephone" name="tel" autocomplete="off"
                class="form-control bg-transparent" />
            <!--end::Telephone-->
        </div>
        <!--end::Input group--->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Adresse-->
            <input type="text" placeholder="Adresse" name="adresse" autocomplete="off"
                class="form-control bg-transparent" />
            <!--end::Adresse-->
        </div>
        <!--end::Input group--->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off"
                class="form-control bg-transparent" />
            <!--end::Email-->
        </div>
        <!--end::Input group-->

        <!-- ... Other form fields ... -->

        <!--begin::Input group--->
        <div class="fv-row mb-8" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control bg-transparent" type="password" placeholder="Mot de passe"
                        name="password" autocomplete="off" />

                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                        data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->

                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Hint-->
            <div class="text-muted">
                Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles.
            </div>
            <!--end::Hint-->
        </div>
        <!--end::Input group--->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Repeat Password-->
            <input placeholder="Répéter le mot de passe" name="password_confirmation" type="password"
                autocomplete="off" class="form-control bg-transparent" />
            <!--end::Repeat Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Input group--->
        <div class="fv-row mb-10">
            <div class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1" />

                <label class="form-check-label fw-semibold text-gray-700 fs-6">
                    J'accepte

                    <a href="#" class="ms-1 link-primary">les termes et conditions</a>.
                </label>
            </div>
        </div>
        <!--end::Input group--->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => 'Enregistrer'])
            </button>
        </div>
        <!--end::Submit button-->

        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">
            Vous avez déjà un compte ?

            <a href="/login" class="link-primary fw-semibold">
                Connectez-vous
            </a>
        </div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->

</x-auth-layout>
