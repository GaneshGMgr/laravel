@extends('layouts.master')
@section('head')
<title>Jobster -Leagle Document</title>
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
@endsection
@section('content')
<section class="pxp-page-header-simple">
    <div class="pxp-container">
        <h1>Search Jobs</h1>
        <div class="pxp-hero-subtitle pxp-text-ligh">Search your career opportunity through <strong>12,800</strong> jobs</div>
        <div class="pxp-hero-form pxp-hero-form-round pxp-large mt-3 mt-lg-4 pxp-has-border">
            <form class="row gx-3 align-items-center">
                <div class="col-12 col-lg">
                    <div class="input-group mb-3 mb-lg-0">
                        <span class="input-group-text"><span class="fa fa-search"></span></span>
                        <input type="text" class="form-control" placeholder="Job Title or Keyword">
                    </div>
                </div>
                <div class="col-12 col-lg pxp-has-left-border">
                    <div class="input-group mb-3 mb-lg-0">
                        <span class="input-group-text"><span class="fa fa-globe"></span></span>
                        <input type="text" class="form-control" placeholder="Country">
                    </div>
                </div>
                <div class="col-12 col-lg pxp-has-left-border">
                    <div class="input-group mb-3 mb-lg-0">
                        <span class="input-group-text"><span class="fa fa-folder-o"></span></span>
                        <select class="form-select">
                            <option selected="">All categories</option>
                            <option>Business Development</option>
                            <option>Construction</option>
                            <option>Customer Service</option>
                            <option>Finance</option>
                            <option>Healthcare</option>
                            <option>Human Resources</option>
                            <option>Marketing &amp; Communication</option>
                            <option>Project Management</option>
                            <option>Software Engineering</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-auto">
                    <button>Find Jobs</button>
                </div>
            </form>
        </div>
        <div class="pxp-hero-form-filter mt-3 mt-lg-4 pxp-has-bg-color">
            <div class="row justify-content-start">
                <div class="col-12 col-sm-auto">
                    <div class="mb-3 mb-lg-0">
                        <select class="form-select">
                            <option selected="">Type of employment</option>
                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>
                            <option value="3">Remote</option>
                            <option value="4">Internship</option>
                            <option value="5">Contract</option>
                            <option value="6">Training</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-auto">
                    <div class="mb-3 mb-lg-0">
                        <select class="form-select">
                            <option selected="">Experience level</option>
                            <option value="1">No Experience</option>
                            <option value="2">Entry-Level</option>
                            <option value="3">Mid-Level</option>
                            <option value="4">Senior-Level</option>
                            <option value="5">Manager / Executive</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-auto">
                    <div class="mb-3 mb-lg-0">
                        <select class="form-select">
                            <option selected="">Salary range</option>
                            <option value="1">$700 - $1000</option>
                            <option value="2">$1000 - $1200</option>
                            <option value="3">$1200 - $1400</option>
                            <option value="4">$1500 - $1800</option>
                            <option value="5">$2000 - $3000</option>
                            <option value="5">More than $3000</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
