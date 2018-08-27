@extends('layouts.private')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h2><i class="material-icons" style="font-size: 45px;vertical-align: middle;margin-top: -5px;">settings</i>{{ __('translation.setting')}}</h2>               
    </div> 
    <div class="alert-message">
      <span class="closebtn-message">&times;</span>  
      Setting is successed!
    </div>     
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="notice-content col-lg-6 col-md-6"> 
          <form action = "language" method="post">
            <div class="row notice">
              <div class="col-sm-12">                
                  <label>{{ trans('translation.Language')}}</label>
                  <select name="locale" class="form-control" id="locale">
                      <option disabled selected value>{{ trans('translation.set_lang')}}</option>
                      <option value="en" {{App::getLocale() == 'en' ? 'selected' : ''}}>{{ trans('translation.English')}}</option>
                      <option value="ko" {{App::getLocale() == 'ko' ? 'selected' : ''}}>{{ trans('translation.Korean')}}</option>
                      <option value="ch" {{App::getLocale() == 'ch' ? 'selected' : ''}}>{{ trans('translation.Chinese')}}</option>
                      <option value="sp" {{App::getLocale() == 'sp' ? 'selected' : ''}}>{{ trans('translation.Spanish')}}</option>
                      <option value="po" {{App::getLocale() == 'po' ? 'selected' : ''}}>{{ trans('translation.Portuguese')}}</option>
                  </select>                                    
              </div>                                              
            </div>
            <div class="row notice">
              <div class="col-sm-12">             
                <input type="checkbox" id="default" name="default" class="filled-in chk-col-cyan">
                <label for="default">{{ trans('translation.label_lang')}}</label>
              </div>
            </div>       
            <div class="">
              <div class="col-lg-12">                                       
                <div class="col-lg-4" style="float: right;">         
                    <input type="submit" class="btn btn-block settings" value={{ trans('translation.save')}}>
                </div>             
              </div>           
            </div>
          </form>
          {{ csrf_field() }}  
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>jQuery(function(){new Adminpanel.Controllers.Settings();});</script>
@endsection