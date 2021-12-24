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
                        <li class="breadcrumb-item"><a href="{{url('admin/cms-page')}}">Cms Pages</a></li>
                        <li class="breadcrumb-item active">Edit Homepage Information</li>
                     </ol>
                  </div>
                  <h4 class="page-title">Edit Homepage Information</h4>
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
                              <h4 class="header-title mb-3 pull-left">Edit Homepage Information</h4> 
                              <a href="{{url('admin/cms-page')}}" class="btn btn-primary pull-right  mb-3">Back To Pages</a>
                           </div>
                        </div>
                     </div>
                        <form method="post" id="termForm" action="{{url('admin/update-homepage-information')}}" enctype="multipart/form-data" >
                        @csrf    

                         <div class="row">
                            <div class="col-lg-6">
                                <p>Banner Image 1</p>
                                <div class=" profile_user">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="user-image1">
                                                <img id="old_image" class="rounded-circle img-thumbnail" src="{{@$homepageInformation['banner_image1']?asset('frontend/landingPage/assets/images/'.@$homepageInformation['banner_image1']):asset('frontend/images/default.jpg')}}">
                                                <label for="img_upload">Upload Banner Image 1</label>
                                                <input type="file" id="img_upload" style="display:none" accept="image/*" name="banner_image1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            </br>
                            <div class="col-lg-6">
                                <p>Banner Image 2</p>
                                <div class=" profile_user">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="user-image1">
                                                <img id="old_banner_image" class="rounded-circle img-thumbnail" src="{{@$homepageInformation['banner_image2']?asset('frontend/landingPage/assets/images/'.@$homepageInformation['banner_image2']):asset('frontend/images/default.jpg')}}">
                                                <label for="img_banner_upload">Upload Banner Image 2</label>
                                                <input type="file" id="img_banner_upload" style="display:none" accept="image/*" name="banner_image2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            </br>
                            </br>
                            </br>
                            <div class="col-lg-6">
                                <p>Main Video</p>
                                <div class=" profile_user">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="user-image1">
                                                 <video id="old_video" class=" img-thumbnail" width="260" height="180" controls>
                                                  <source src="{{@$homepageInformation['main_video']?asset('frontend/landingPage/assets/images/'.@$homepageInformation['main_video']):asset('frontend/images/videologo.png')}}" type="video/mp4">
                                                </video> 
                                              <div class="clearfix"></div>
                                                <label for="img_upload_video" >Upload Main Video</label>
                                                <input type="file" style="display:none" id="img_upload_video" accept="video/mp4,video/x-m4v,video/*" name="main_video">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p>Step 1 Image</p>
                                <div class=" profile_user">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="user-image1">
                                                <img id="old_image_step1" class="rounded-circle img-thumbnail" src="{{@$homepageInformation['step1_image']?asset('frontend/landingPage/assets/images/'.@$homepageInformation['step1_image']):asset('frontend/images/default.jpg')}}">
                                                <label for="img_upload_step1">Upload Step 1 Image</label>
                                                <input type="file" id="img_upload_step1" style="display:none" accept="image/*" name="step1_image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            </br>
                            
                            <div class="col-lg-6">
                                <p>Step 2 Image</p>
                                <div class=" profile_user">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="user-image1">
                                                <img id="old_image_step2" class="rounded-circle img-thumbnail" src="{{@$homepageInformation['step2_image']?asset('frontend/landingPage/assets/images/'.@$homepageInformation['step2_image']):asset('frontend/images/default.jpg')}}">
                                                <label for="img_upload_step2">Upload Step 2 Image</label>
                                                <input type="file" id="img_upload_step2" style="display:none" accept="image/*" name="step2_image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            </br>
                            <div class="col-lg-6">
                                <p>Step 3 Image</p>
                                <div class=" profile_user">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="user-image1">
                                                <img id="old_image_step3" class="rounded-circle img-thumbnail" src="{{@$homepageInformation['step3_image']?asset('frontend/landingPage/assets/images/'.@$homepageInformation['step3_image']):asset('frontend/images/default.jpg')}}">
                                                <label for="img_upload_step3">Upload Step 3 Image</label>
                                                <input type="file" id="img_upload_step3" style="display:none" accept="image/*" name="step3_image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            </br>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Page title</label>
                                    <input class="form-control"  name="page_title" type="text"  value="{{@$homepageInformation->page_title}}">    
                                </div>
                            </div>

                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label>Title</label>
                                     <input class="form-control" id="title" name="title" type="text"  value="{{@$homepageInformation->title}}">    
                                 </div>
                             </div>

                             <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="">Description</label>
                                    <textarea class="form-control textar" name="description">{{@$homepageInformation->description}}</textarea>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label>Feature title</label>
                                     <input class="form-control"  name="feature_title" type="text"  value="{{@$homepageInformation->feature_title}}">    
                                 </div>
                             </div>

                             <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="">Feature Description</label>
                                    <textarea class="form-control textar" name="feature_description">{{@$homepageInformation->feature_description}}</textarea>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label>Step1 title</label>
                                     <input class="form-control"  name="step1_title" type="text"  value="{{@$homepageInformation->step1_title}}">    
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="">Step1 Description</label>
                                    <textarea class="form-control textar" name="step1_description">{{@$homepageInformation->step1_description}}</textarea>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label>Step2 title</label>
                                     <input class="form-control"  name="step2_title" type="text"  value="{{@$homepageInformation->step2_title}}">    
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="">Step2 Description</label>
                                    <textarea class="form-control textar" name="step2_description">{{@$homepageInformation->step2_description}}</textarea>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label>Step3 title</label>
                                     <input class="form-control"  name="step3_title" type="text"  value="{{@$homepageInformation->step3_title}}">    
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="">Step3 Description</label>
                                    <textarea class="form-control textar" name="step3_description">{{@$homepageInformation->step3_description}}</textarea>
                                 </div>
                             </div>
                             
                             <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="">Footer Drescription</label>
                                    <textarea class="form-control textar" name="footer_description">{{@$homepageInformation->footer_description}}</textarea>
                                 </div>
                             </div>

                         </div>

                         <!-- end col-->
                         <div class="row mt-3">
                             <div class="col-12 text-center">
                                 <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i> Submit</button>
                                 
                                 <a href="{{url('admin/pages/list')}}" type="submit" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x mr-1"></i> Cancel</a>
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
        function readURL1(input)
        {
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#old_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#img_upload').change(function(){
            var img_name = $(this).val();
            if(img_name != '' && img_name != null){
                var img_arr = img_name.split('.');
                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png'){
                    input = document.getElementById('img_upload');
                    readURL1(this);
                }
            } else{
                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }
        });

        function readURL4(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#old_image_step1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        $('#img_upload_step1').change(function(){
            var img_name = $(this).val();
            if(img_name != '' && img_name != null){
                var img_arr = img_name.split('.');
                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png'){
                    input = document.getElementById('img_upload_step1');
                    readURL4(this);
                }
            } else{
                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }
        });

        function readURL5(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#old_image_step2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        $('#img_upload_step2').change(function(){
            var img_name = $(this).val();
            if(img_name != '' && img_name != null){
                var img_arr = img_name.split('.');
                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png'){
                    input = document.getElementById('img_upload_step2');
                    readURL5(this);
                }
            } else{
                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }
        });

        function readURL6(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#old_image_step3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        $('#img_upload_step3').change(function(){
            var img_name = $(this).val();
            if(img_name != '' && img_name != null){
                var img_arr = img_name.split('.');
                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png'){
                    input = document.getElementById('img_upload_step3');
                    readURL6(this);
                }
            } else{
                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }
        });

    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        function readURL3(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_banner_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#img_banner_upload').change(function(){
            var img_name = $(this).val();
            if(img_name != '' && img_name != null){
                var img_arr = img_name.split('.');
                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png'){
                    input = document.getElementById('img_banner_upload');
                    readURL3(this);
                }
            } else{
                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        function readURL2(input1){
            if(input1.files && input1.files[0]){
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_video').attr('src', e.target.result);
                }
                reader.readAsDataURL(input1.files[0]);
            }
        }

        $('#img_upload_video').change(function(){
            var img_name = $(this).val();
            if(img_name != '' && img_name != null){
                var img_arr = img_name.split('.');
                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                if(ext == 'mp4' || ext == 'MOV' || ext == 'AVI'|| ext == 'WMV'){
                    input = document.getElementById('img_upload_video');
                    readURL2(this);
                }
            } else{
                $(this).val('');
                alert('Please select an video of .mp4, .mov, .avi file format.');
            }
        });
    });
</script>
    

<script src="{{ url('public/backend/assets/js/tinymce/tinymce.min.js')}}"></script>

<script type="text/javascript">
    
    tinymce.init({
        selector: '.textar,.textar1',
        height: 300,
        menubar: true,
        forced_root_block : "", /*to remove auto p tag */
        plugins: [
            'advlist autolink link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media contextmenu paste code'
        ],
         toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        image_advtab: true,
        /*to take automatic urls starts*/
        relative_urls: false,
        remove_script_host: false,
        /*to take automatic urls ends*/
        file_browser_callback_types: 'file image media',
       
        image_title: true, 
        // enable automatic uploads of images represented by blob or data URIs
        automatic_uploads: true,
        images_upload_url: "{{url('admin/contentManagement/termAndCondtion')}}",

        file_picker_types: 'image media file', 
        setup: function (editor) {
            editor.on('change', function (e) {
                // alert(editor.getContent());
                $('textarea[name="'+editor.targetElm.name+'"]').next('input').val($.trim(editor.getContent()));
            });
        },     
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var id = 'blobid' + (new Date()).getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                var blobInfo = blobCache.create(id, file);
                blobCache.add(blobInfo);
                // alert(blobInfo.blobUri());
                cb(blobInfo.blobUri(), { title: file.name });
            };

           input.click();
        }
    });

</script>

<script type="text/javascript">
    $('#termForm').validate({
        ignore:[],
        rules:{
            "page_title":{
                required:true,
            },
            "title":{
                required:true,
                maxlength:200,
                minlength:5,
            },
            "description":{
                required:true,
                minlength:20,
            },
            "feature_title":{
                required:true,
            },
            "feature_description":{
                required:true,
                minlength:20,
            },
            "step1_title":{
                required:true,
            },
            "step1_description":{
                required:true,
                minlength:20,
            },            
            "step2_title":{
                required:true,
            },
            "step2_description":{
                required:true,
                minlength:20,
            },
            "step3_title":{
                required:true,
            },
            "step3_description":{
                required:true,
                minlength:20,
            },
            "footer_description":{
                required:true,
                minlength:20,
            },
        },
        messages:{

            "page_title":{
                required:"Please enter Page title",
            },
            "title":{
                required:"Please enter title",
                maxlength:"Maximum 200 characters are allowed",
                minlength:"Title must contain 5 characters",
            },
            "description":{
                required:"Please enter description",
                minlength:"Description must contain 20 characters",
            },
            "feature_title":{
                required:"Please enter feature title",
            },
            "feature_description":{
                required:"Please enter feature description",
                minlength:"Feature description must contain 20 characters",
            },
            "step1_title":{
                required:"Please enter step1 title",
            },
            "step1_description":{
                required:"Please enter step1 description",
                minlength:"Step1 description must contain 20 characters",
            },
            "step2_title":{
                required:"Please enter step2 title",
            },
            "step2_description":{
                required:"Please enter step2 description",
                minlength:"Step2 description must contain 20 characters",
            },
            "step3_title":{
                required:"Please enter step3 title",
            },
            "step3_description":{
                required:"Please enter step3 description",
                minlength:"Step3 description must contain 20 characters",
            },
            "footer_description":{
                required:"Please enter footer description",
                minlength:"Footer drescription must contain 20 characters",
            },

        },
    });
</script>
