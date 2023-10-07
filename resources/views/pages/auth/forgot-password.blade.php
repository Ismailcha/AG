<x-auth-layout>

    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url="{{ route('login') }}"
        action="{{ route('password.request') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">
                Mot de passe oublié ?
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">
                Entrez votre e-mail pour réinitialiser votre mot de passe.
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off"
                class="form-control bg-transparent" value="demo@demo.com" />
            <!--end::Email-->
        </div>

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                @include('partials/general/_button-indicator', ['label' => 'Envoyer'])
            </button>

            <a href="{{ route('login') }}" class="btn btn-light">Annuler</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->

</x-auth-layout>
