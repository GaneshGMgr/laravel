



<header class="backdrop-filter backdrop-blur-2xl uk-sticky uk-active uk-sticky-below uk-sticky-fixed" uk-sticky="cls-inactive: is-dark is-transparent border-b" style="position: fixed; top: 0px; width: 1519px;">
            <div class="header_inner">
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{ route('frontend.index') }}">
                            <img src="{{ asset(siteSetting()->site_logo) }}" alt="">
                            {{-- <img src="../assets/images/logo-light.png" class="logo_inverse" alt="">
                            <img src="../assets/images/logo-mobile.png" class="logo_mobile" alt=""> --}}
                        </a>
                    </div>

                    <!-- icon menu for mobile -->
                    <div class="triger" uk-toggle="target: #wrapper ; cls: is-active">
                    </div>

                </div>
                <div class="right-side">

                    <!-- Header search box  -->




                </div>
            </div>
        </header>
