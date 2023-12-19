<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->

        <div class="col-xl-6 mb-5 mb-xl-10">
            @include('partials/widgets/tables/_widget-16')
        </div>
        <div class="col-xl-6 mb-5 mb-xl-10">
            @include('partials/widgets/tables/_widget-106')
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="col-xl-6 mb-5 mb-xl-10">
                @include('partials/widgets/tables/_widget-1061')
            </div>
            <div class="col-xl-6 mb-5 mb-xl-10">
                @include('partials/widgets/tables/_widget-1062')
            </div>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

</x-default-layout>