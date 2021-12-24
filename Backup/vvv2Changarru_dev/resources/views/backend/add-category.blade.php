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
                        <li class="breadcrumb-item"><a href="{{url('admin/categoryManagement/category/list')}}">Business Category</a></li>
                        <li class="breadcrumb-item active">Add Business Category</li>

                     </ol>
                  </div>
                  <h4 class="page-title">Add Business Category</h4>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="d-flex align-items-center justify-content-between">
                              <h4 class="header-title mb-3 pull-left">Add Business Category</h4> 
                              <a href="categories.php" class="btn btn-primary pull-right  mb-3">Back To Business Categories</a>
                           </div>
                        </div>
                     </div>
                     <form action="{{url('admin/categoryManagement/category/add')}}" id="add_category" method="post"  enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                 <label for="">Category Name</label>
                                 <input class="form-control" required="" type="text" name="name" value="" />
                               </div>
                            </div>
                           
                            <div class="col-12 text-left">
                               <button type="submit" class="btn btn-success waves-effect waves-light">
                                  <i class="fe-check-circle mr-1"></i> Create
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



<script type="text/javascript">    
    $(document).ready(function(){
        $('#add_category').validate({
            rules: {
                "name": {
                    required: true
                },
            },
            messages: {
                "name":{
                    required:"Plesae enter category name"
                },
            },
            submitHandler:function(form){
                form.submit();
            }
        });
    });
</script>