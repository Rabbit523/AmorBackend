@extends('layouts.private')
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="block-header">
          <h2>{{ trans('translation.manage_user')}}</h2>         
      </div>
      <!-- Body Copy -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="header-list"> 
                <div class="row">
                    <div class="label-table id">{{ trans('translation.gender')}}</div>
                    <div class="label-table name">{{ trans('translation.name')}}</div>
                    <div class="label-table email">{{ trans('translation.Language')}}</div>
                    <div class="label-table phone">{{ trans('translation.region')}}</div>
                    <div class="label-table account">{{ trans('translation.recount')}}</div>
                    <div class="label-table diamond">{{ trans('translation.diamond')}}</div>
                    <div class="label-table edit">{{ trans('translation.edit')}}</div>               
                </div>
            </div>
            <div class="items-list">
                @foreach($datas as $data)                                                                                  
                <div class="item">   
                    <div class="item-toggle">  
                        <div class="row">
                            <div class="label-table id">{{$data->gender}}</div>
                            <div class="label-table name">{{$data->name}}</div>
                            <div class="label-table email">{{$data->language}}</div>
                            <div class="label-table phone">{{$data->region}}</div>
                            <div class="label-table account">{{$data->membership}}</div>
                            <div class="label-table diamond">{{$data->diamonds}}</div>
                            <div class="label-table edit" data-info="{{json_encode($data)}}"><span><i class="fa fa-edit" style="color:#00BCD4;"></i></span></div>  
                        </div>                        
                    </div>                                                                                                    
                </div>          
                @endforeach        
            </div>
        </div>     
      </div>
      <!-- #END# Body Copy -->    
  </div>
</section>
<div class="modal fade modal-user" id="modal-user" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>{{ trans('translation.user_info')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>                          
            </div>
            <div class="modal-body">
                <div class="row-modal">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{ trans('translation.name')}}</label>
                                <input type="text" name="user_name" id="user_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{ trans('translation.gender')}}</label>
                                <input type="text" name="gender" id="gender" class="form-control">
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="row-modal">
                    <div class="row">                       
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{ trans('translation.age')}}</label>
                                <input type="tel" name="age" id="age" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{ trans('translation.Language')}}</label>
                                <input type="text" name="language" id="language" class="form-control">
                            </div>
                        </div>                   
                    </div>
                </div>
                <div class="row-modal">                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <form name = "myForm">
                                    <label for="">{{ trans('translation.region')}}</label>
                                    <input type="email" name="email" id="region" class="form-control">                                    
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{ trans('translation.account_dg')}}</label>
                                <input type="text" name="account" id="account" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-modal">                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{ trans('translation.diamond')}}</label>
                                <input type="text" name="gem" id="gem" class="form-control">
                            </div>
                        </div>   
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{ trans('translation.hobby')}}</label>
                                <input type="text" name="hobby" id="hobby" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-modal">                    
                    <div class="row">                       
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{ trans('translation.start_date')}}</label>
                                <input type="text" name="open_date" id="open_date" class="form-control">
                            </div>
                        </div>   
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="">{{ trans('translation.expired_date')}}</label>
                                <input type="text" name="close_date" id="close_date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>                              
            </div>
            <div class="modal-footer">    
                <div class="row">                       
                    <div class="col-xs-12 col-sm-3" style="float: right;margin-right: 20px;">         
                        <a id="save" class="btn btn-block">{{ trans('translation.save')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>jQuery(function(){new Adminpanel.Controllers.UserManagement();});</script>
@endsection