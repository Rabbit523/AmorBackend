@extends('layouts.private')
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="block-header">
          <h2>{{ trans('translation.dashboard')}}</h2>       
      </div>

      <!-- Widgets -->
      <div class="row clearfix">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-pink hover-expand-effect">
                  <div class="icon">
                      <i class="material-icons">playlist_add_check</i>
                  </div>
                  <div class="content">
                      <div class="text">NEW TASKS</div>
                      <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-cyan hover-expand-effect">
                  <div class="icon">
                      <i class="material-icons">help</i>
                  </div>
                  <div class="content">
                      <div class="text">NEW TICKETS</div>
                      <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-light-green hover-expand-effect">
                  <div class="icon">
                      <i class="material-icons">forum</i>
                  </div>
                  <div class="content">
                      <div class="text">NEW COMMENTS</div>
                      <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-orange hover-expand-effect">
                  <div class="icon">
                      <i class="material-icons">person_add</i>
                  </div>
                  <div class="content">
                      <div class="text">NEW VISITORS</div>
                      <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                  </div>
              </div>
          </div>
      </div>
      <!-- #END# Widgets -->
  </div>
</section>
@endsection

@section('scripts')
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="plugins/flot-charts/jquery.flot.js"></script>
<script src="plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="plugins/flot-charts/jquery.flot.time.js"></script>
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/morrisjs/morris.js"></script>

<script src="js/pages/index.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
<script>jQuery(function(){new Adminpanel.Controllers.Dashboard();});</script>
@endsection