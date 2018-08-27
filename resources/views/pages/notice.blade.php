@extends('layouts.private')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h2><i class="material-icons" style="font-size: 45px;vertical-align: middle;margin-top: -5px;">notifications</i>{{ trans('translation.notice_title') }}</h2>          
    </div>     
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="notice-content col-lg-6 col-md-6"> 
          <div class="row notice">
            <div class="col-sm-12">
              <label>{{ trans('translation.msg_cat') }}*</label>
              <select name="message" id="message" class="form-control">
                  <option disabled selected value>{{ trans('translation.category') }}</option>
                  <option value="Membership">{{ trans('translation.membership') }}</option>
                  <option value="Account">{{ trans('translation.account') }}</option>
                  <option value="Diamond">{{ trans('translation.diamond') }}</option>
                  <option value="Alert">{{ trans('translation.alert') }}</option>
              </select>                         
            </div>            
          </div>
          <div class="row notice">
            <div class="col-sm-6">
              <label style="width: 100%;">{{ trans('translation.search')}}*</label>                 
              <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-search"></i>
                <input type="text" name="search" id="search" class="form-control search-form" placeholder= {{ trans('translation.search_wd') }}>   
              </div>      
            </div>
            <div class="col-sm-6">           
              <label style="width: 100%;">{{ trans('translation.msg_to')}}*</label>                           
              <select name="users" id="users" class="form-control search-result">
                <option disabled selected value>{{ trans('translation.searched_user') }}</option>
              </select>                                
            </div>           
          </div>
          <div class="row notice">
            <div class="col-lg-12">
              <label>{{ trans('translation.drop_img')}}*</label> 
              <div class="module type-upload-image">               
                <div class="content">
                    <form action="/file-upload" class="dropzone no-margin" id="image-uploader">
                        <div class="fallback">
                            <input name="file" type="file" multiple/>
                        </div>
                    </form>
                </div>
              </div>            
            </div>           
          </div>
          <div class="row notice">
            <div class="col-lg-12">    
              <div class="col-lg-4" style="float: right;">         
                  <a id="cancel" class="btn btn-block" style="background:#9e9e9e;">{{ trans('translation.cancel')}}</a>
              </div>                        
              <div class="col-lg-4" style="float: right;">         
                  <a id="save" class="btn btn-block">{{ trans('translation.submit')}}</a>
              </div>             
            </div>           
          </div>
        </div>    
      </div>
    </div> 
  </div>
</section>
@endsection

@section('scripts')
<script>jQuery(function(){new Adminpanel.Controllers.Notice();});</script>
@endsection