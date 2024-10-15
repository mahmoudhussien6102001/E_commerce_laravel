@extends('website.layouts.master')

@section('title', __('contact.contact_us'))

@section('main-content')
{{-- ContactUs page  --}}

<div class="site-wrap" style="background-color: #F5F5F7;"> <!-- خلفية موحدة بلون موف باهت -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="index.html" class="text-primary">{{ __('home.home') }}</a>
                    <span class="mx-2 mb-0 text-muted">/</span>
                    <strong class="text-dark">{{ __('contact.contact_us') }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-purple">{{ __('contact.get_in_touch') }}</h2> <!-- لون موف للعنوان -->
                </div>
                <div class="col-md-7">
                    <form action="#" method="post">
                        @csrf
                        <div class="p-3 p-lg-5 border rounded-lg shadow-lg" style="background-color: #FDFDFD; border-radius: 20px;"> <!-- خلفية فاتحة مع زوايا مستديرة -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-dark">{{ __('contact.first_name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-pill" id="c_fname" name="c_fname" style="background-color: #EDEDED; border: 1px solid #9C27B0;"> <!-- خلفية فاتحة مع حافة موف داكن -->
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-dark">{{ __('contact.last_name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-pill" id="c_lname" name="c_lname" style="background-color: #EDEDED; border: 1px solid #9C27B0;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_email" class="text-dark">{{ __('contact.email') }} <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control rounded-pill" id="c_email" name="c_email" style="background-color: #EDEDED; border: 1px solid #9C27B0;" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_subject" class="text-dark">{{ __('contact.subject') }}</label>
                                    <input type="text" class="form-control rounded-pill" id="c_subject" name="c_subject" style="background-color: #EDEDED; border: 1px solid #9C27B0;">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_message" class="text-dark">{{ __('contact.message') }}</label>
                                    <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control rounded-lg" style="background-color: #EDEDED; border: 1px solid #9C27B0; border-radius: 10px;" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-lg btn-block rounded-pill hover-effect" value="{{ __('contact.send_message') }}" style="background-color:#9C27B0; color: white; border-radius: 30px;"> <!-- زر موف فاتح -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 ml-auto">
                    <div class="p-4 border mb-3 bg-white rounded-lg shadow-sm"> <!-- لون أبيض للخلفية -->
                        <span class="d-block h6 text-uppercase text-purple">{{ __('contact.address.new_york') }}</span> <!-- لون موف للنص -->
                        <p class="mb-0 text-purple">{{ __('contact.address_detail') }}</p>
                    </div>
                    <div class="p-4 border mb-3 bg-white rounded-lg shadow-sm">
                        <span class="d-block h6 text-uppercase text-purple">{{ __('contact.address.london') }}</span> <!-- لون موف للنص -->
                        <p class="mb-0 text-purple">{{ __('contact.address_detail') }}</p>
                    </div>
                    <div class="p-4 border mb-3 bg-white rounded-lg shadow-sm">
                        <span class="d-block h6 text-uppercase text-purple">{{ __('contact.address.canada') }}</span> <!-- لون موف للنص -->
                        <p class="mb-0 text-purple">{{ __('contact.address_detail') }}</p>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-effect:hover {
        background-color: #7B1FA2 !important; /* لون زر عند التمرير - موف أغمق */
        transition: background-color 0.3s ease;
    }

    .text-purple {
        color: #7B1FA2; /* لون موف */
    }
</style>

@endsection
