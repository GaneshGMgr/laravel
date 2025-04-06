@extends('frontend.layouts.login_master')

@section('content')
<div>
    <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
        <form action="{{route('frontend.register.save')}}" method="POST" id="register" class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md eq-section" enctype="multipart/form-data" novalidate>
            @csrf
            <h1 class="lg:text-2xl text-xl font-semibold mb-6"> Register </h1>

            <div class="grid lg:grid-cols-2 gap-3">

                <div>
                    <label class="mb-0" for="fullname"> Fullname </label>
                    <input type="text" placeholder="Fullname" name="name" id="fullname"
                        class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                </div>
                <div>
                    <label class="mb-0" for="email"> Email Address </label>
                    <input type="email" placeholder="Info@example.com" name="email" id="email"
                        class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                </div>
                <div class="lg:col-span-2">
                    <label class="mb-0" for="password"> Password </label>
                    <input type="password" placeholder="******" name="password" id="password"
                        class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                </div>
                {{-- <div class="lg:col-span-2">
                    <label class="mb-0"> Phone: optional </label>
                    <input type="text" placeholder="98..." name="phone" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                </div> --}}
            </div>

            {{-- <div class="checkbox">
                <input type="checkbox" id="chekcbox1" checked="">
                <label for="chekcbox1"><span class="checkbox-icon"></span> I agree to the <a href="pages-terms.html"
                        target="_blank" class="uk-text-bold uk-text-small uk-link-reset"> Terms and Conditions </a>
                </label>
            </div> --}}

            <div>
                <button type="submit"
                id="save"
                    class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                    Get Started</button>
            </div>
        </form>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .lg:grid-cols-2 {
            grid-template-columns: 1fr;
        }
    }
</style>



@endsection

<script>
        init_validator();
    validator.defaults.alerts=false;

    $(function(){

        $("#register").submit(function(event){
            event.preventDefault();

            if(validator.checkAll($(this))){

                const data = new FormData(this)
                const url = $(this).attr('action')

                window.ct.postData(url,data,$("save")).then(function(responseData){
                    toastr.success(responseData.msg);
                    location.replace(responseData.result)
                },
                function(error){
                    toastr.error(error.msg);
                    window.ct.populateFormError
                    ("#register",error.result)
                }
                )
            }
            return false
        })
    });
</script>
