@extends('master')

@section('content')
    @include('includes.toaster')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-12">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Add
                            Books</h1>
                        <!--end::Title-->

                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->

                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Contact-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-lg-17">
                            <!--begin::Row-->
                            <div class="row mb-3">
                                <!--begin::Col-->
                                <div class="col-md-12 pe-lg-10">
                                    <!--begin::Form-->
                                    <form action="{{ route('bookadd') }}" class="form mb-15" method="post"
                                        id="kt_contact_form" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-semibold mb-2">Book Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="name" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-semibold mb-2">Author</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="author" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--end::Label-->
                                                <label class="fs-5 fw-semibold mb-2">Distributor</label>
                                                <!--end::Label-->
                                                <!--end::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder=""
                                                    name="distributor" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-5 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Publisher</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder=""
                                                name="publisher" />
                                            <!--end::Input-->

                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-semibold mb-2">Isbn no.</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="Isbn_number" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-semibold mb-2">Image</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="file" ssclass="form-control form-control-solid"
                                                    name="image" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Submit-->
                                            <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                                                <!--begin::Indicator label-->
                                                <span class="indicator-label">Add</span>
                                                <!--end::Indicator label-->
                                                <!--begin::Indicator progress-->
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                <!--end::Indicator progress-->
                                            </button>
                                            <!--end::Submit-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 ps-lg-10">
                                    <!--begin::Map-->
                                    <div id="kt_contact_map" class="w-100 rounded mb-2 mb-lg-0 mt-2" style="height: 486px">
                                    </div>
                                    <!--end::Map-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Contact-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2022&copy;</span>
                    <a href="https://keenthemes.com/" target="_blank"
                        class="text-gray-800 text-hover-primary">Keenthemes</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://devs.keenthemes.com/" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
