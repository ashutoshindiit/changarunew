@include('backend.common.header')
@include('backend.common.navbar')
@include('backend.common.leftside-menu')

<div class="content-page">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box">
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Commission Settings</a></li>
                     </ol>
                  </div>
                  <h4 class="page-title">Commission Settings</h4>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                    <div class="card-body">
                        <form action="{{url('admin/commissionManagement/commission/commission-list')}}" id="commisionSettingForm" method="post"  enctype="multipart/form-data" >
                           @csrf
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                   <div class="form-group">
                                      <label>Commision Type</label>
                                       <select class="form-control commisionTypeClass" name="commision_type" type="text">
                                            <option value="" selected disabled >Select Commision Type <body></body></option> 
                                            <option value="fixed" 
                                            @if($commissionSetting['commision_type'] == 'fixed') selected @endif}}>Fixed</option>
                                            <option value="percent" 
                                            @if($commissionSetting['commision_type'] ==  'percent') selected @endif}}>Percent</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="col-lg-12 c_amount">
                                    <div class="form-group">
                                        <label for="">Commision Amount</label>
                                        <input type="text" class="form-control" value="{{@$commissionSetting['commission_amount']}}" name="commision_amount" placeholder="Enter Commission Amount">
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 c_percent">
                                    <div class="form-group">
                                        <label for="">Commision Percent</label>
                                        <input type="text" class="form-control" value="{{@$commissionSetting['commission_percentage']}}" name="commision_percent" placeholder="Enter Commission Percentage">
                                    </div>
                                </div>

                                <div class="col-12 text-left">
                                  <button type="submit" class="btn btn-success waves-effect waves-light">
                                      <i class="fe-check-circle mr-1"></i> Save
                                  </button>
                                </div>

                            </div>
                        </form>
                    </div>
               </div>
               <!-- end card-body -->
            </div>
            <!-- end card-->
         </div>
         <!-- end col-->
      </div>
      <!-- end row-->
   </div>
   <!-- container -->
</div>
<!-- content -->
<!-- Header -->

@include('backend.common.footer')

