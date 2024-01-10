@extends('backend.master')

@section('title')
    Create Permission
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Setting', 'child' => 'Create'])
@endsection

@section('body')
   <div class="section">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div>
                       <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                           <li class="nav-item" role="presentation">
                               <button class="nav-link active" id="pills-general-tab" data-bs-toggle="pill" data-bs-target="#pills-general" type="button" role="tab" aria-controls="pills-general" aria-selected="true">General Setting</button>
                           </li>
                           <li class="nav-item" role="presentation">
                               <button class="nav-link" id="pills-localization-tab" data-bs-toggle="pill" data-bs-target="#pills-localization" type="button" role="tab" aria-controls="pills-localization" aria-selected="false">Localization</button>
                           </li>
                           <li class="nav-item" role="presentation">
                               <button class="nav-link" id="pills-payment-tab" data-bs-toggle="pill" data-bs-target="#pills-payment" type="button" role="tab" aria-controls="pills-payment" aria-selected="false">Payment Settings</button>
                           </li>
                           <li class="nav-item" role="presentation">
                               <button class="nav-link" id="pills-email-tab" data-bs-toggle="pill" data-bs-target="#pills-email" type="button" role="tab" aria-controls="pills-email" aria-selected="false">Email Setting</button>
                           </li>
                           <li class="nav-item" role="presentation">
                               <button class="nav-link" id="pills-sociallogin-tab" data-bs-toggle="pill" data-bs-target="#pills-sociallogin" type="button" role="tab" aria-controls="pills-sociallogin" aria-selected="false">Social Media Login</button>
                           </li>
                           <li class="nav-item" role="presentation">
                               <button class="nav-link" id="pills-sociallinks-tab" data-bs-toggle="pill" data-bs-target="#pills-sociallinks" type="button" role="tab" aria-controls="pills-sociallinks" aria-selected="false">Social Links</button>
                           </li>
                           <li class="nav-item" role="presentation">
                               <button class="nav-link" id="pills-seo-tab" data-bs-toggle="pill" data-bs-target="#pills-seo" type="button" role="tab" aria-controls="pills-seo" aria-selected="false">SEO Settings</button>
                           </li>
                           <li class="nav-item" role="presentation">
                               <button class="nav-link" id="pills-other-tab" data-bs-toggle="pill" data-bs-target="#pills-other" type="button" role="tab" aria-controls="pills-other" aria-selected="false">Others</button>
                           </li>

                       </ul>

                       <div class="tab-content" id="pills-tabContent">
                           <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab" tabindex="0">
                               <div class="container">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="card">
                                               <div class="card-header d-flex justify-content-between align-items-center">
                                                   <h5 class="card-title">Website Basic Details</h5>
                                               </div>
                                               <div class="card-body pt-0">
                                                   <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
                                                       @csrf
                                                       <fieldset >
                                                           <input type="hidden" name="setting_category" value="general">
                                                           <div class="form-group row mt-2">
                                                               <div class="col-md-6 ">
                                                                   <label for="disabledTextInput" class="form-label">Website Title</label>
                                                                   <input type="text"  class="form-control" name="site_title" placeholder="" value="{{ isset($setting)? $setting->site_title :''}}">
                                                               </div>
                                                               <div class="col-md-6  ">
                                                                   <label for="disabledTextInput" class="form-label">Website Name</label>
{{--                                                                   <input type="text"  class="form-control" name="site_name" placeholder="">--}}
                                                                   <input type="text"  class="form-control" name="site_name" placeholder="" value="{{ isset($setting)? $setting->site_name :''}}">
                                                               </div>
                                                           </div>
                                                           <div class="form-group row mt-2">
                                                               <div class="col-md-6 ">
                                                                   <label for="disabledTextInput" class="form-label">Website Logo</label>
                                                                   <input type="file"  class="form-control" name="site_logo" placeholder="">
                                                                   @if($setting)
                                                                   <img src="{{ asset($setting->site_logo)}}"style="height: 100px;width: 100px" alt="">
                                                                   @endif
                                                               </div>
                                                               <div class="col-md-6  ">
                                                                   <label for="disabledTextInput" class="form-label">Website Favicon</label>
                                                                   <input type="file"  class="form-control" name="site_favicon" placeholder="" >
                                                                   @if($setting)
                                                                       <img src="{{ asset($setting->site_favicon)}}" style="height: 16px;width: 16px"alt="">
                                                                   @endif

                                                               </div>
                                                           </div>
                                                           <div class="form-group row mt-2">
                                                               <div class="col-md-6 ">
                                                                   <label for="disabledTextInput" class="form-label">Website Banner</label>
                                                                   <input type="file"  class="form-control" name="site_banner" placeholder="" >
                                                                   @if($setting)
                                                                   <img src="{{ asset($setting->site_banner)}}" style="height: 250px;width: 250px" alt="">
                                                                   @endif

                                                               </div>
                                                               <div class="col-md-6  ">
                                                                   <label for="disabledTextInput" class="form-label">Website Meta</label>
{{--                                                                   <input type="text"  class="form-control" name="site_meta" placeholder="">--}}
                                                                   <input type="text"  class="form-control" name="site_meta" placeholder="" value="{{ isset($setting)? $setting->site_meta :''}}">
                                                               </div>
                                                           </div>
                                                           <div class="form-group row mt-2">
                                                               <div class="col-md-6 ">
                                                                   <label for="disabledTextInput" class="form-label">Madrasha Email</label>
{{--                                                                   <input type="text"  class="form-control" name="madrasha_email" placeholder="" >--}}
                                                                   <input type="text"  class="form-control" name="madrasha_email" placeholder="" value="{{ isset($setting)? $setting->madrasha_email :''}}">
                                                               </div>
                                                               <div class="col-md-6  ">
                                                                   <label for="disabledTextInput" class="form-label">Madrasha Address</label>
{{--                                                                   <input type="text"  class="form-control" name="madrasha_address" placeholder="" >--}}
                                                                   <input type="text"  class="form-control" name="madrasha_address" placeholder="" value="{{ isset($setting)? $setting->madrasha_address :''}}">
                                                               </div>
                                                           </div>
                                                           <div class="form-group row mt-2">
                                                               <div class="col-md-6 ">
                                                                   <label for="disabledTextInput" class="form-label">Madrasha Division</label>
                                                                   <input type="text"  class="form-control" name="madrasha_division" placeholder="" value="{{ isset($setting)? $setting->madrasha_division :''}}">
{{--                                                                   <input type="text"  class="form-control" name="madrasha_division" placeholder="" >--}}
                                                               </div>
                                                               <div class="col-md-6  ">
                                                                   <label for="disabledTextInput" class="form-label">Madrasha District</label>
{{--                                                                   <input type="text"  class="form-control" name="madrasha_district" placeholder="" >--}}
                                                                   <input type="text"  class="form-control" name="madrasha_district" placeholder="" value="{{ isset($setting)? $setting->madrasha_district :''}}">
                                                               </div>
                                                           </div>

                                                               <input type="submit" class="mt-3 btn btn-outline-success float-end" value="{{isset($setting)? "Update":"Submit"}}">

                                                       </fieldset>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>

                                   </div>
                               </div>
                           </div>
                           <div class="tab-pane fade" id="pills-localization" role="tabpanel" aria-labelledby="pills-localization-tab" tabindex="0">
                               Localization
                           </div>
                           <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab" tabindex="0">
                               payment setting
                           </div>
                           <div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab" tabindex="0">
                               email setting
                           </div>
                           <div class="tab-pane fade" id="pills-sociallogin" role="tabpanel" aria-labelledby="pills-sociallogin-tab" tabindex="0">
                               social media login
                           </div>
                           <div class="tab-pane fade" id="pills-sociallinks" role="tabpanel" aria-labelledby="pills-sociallinks-tab" tabindex="0">
                               social midea links
                           </div>
                           <div class="tab-pane fade" id="pills-seo" role="tabpanel" aria-labelledby="pills-seo-tab" tabindex="0">
                               Seo settings
                           </div>

                           <div class="tab-pane fade" id="pills-other" role="tabpanel" aria-labelledby="pills-other-tab" tabindex="0">
                               others
                           </div>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection
