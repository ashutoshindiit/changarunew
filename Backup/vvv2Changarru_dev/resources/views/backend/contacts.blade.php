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
                                   
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">Queries</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Queries</h4>
                        </div>
                    </div>
                </div> 
           

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                           <div class="row">
                             <div class="col-md-6">
                               <h4 class="header-title mb-3">All Queries </h4>
                             </div>
                            </div>
                            <div class="table-responsive">
                                <table  id="basic-datatable1" class="table  table-hover table-nowrap table-centered m-0">


                             <thead class="thead-light">
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile No.</th>
                                            <th>Query</th>
                                            <th>Reply</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($contactUs as $key => $value): ?>
                                         <tr>

                                             <td>{{$value['full_name']}}</td>
                                             <td>{{@$value['email']}}</td>
                                             <td>{{@$value['phone']}}</td>
                                             <td>@if(@$value['message']) {{@$value['message']}} @else - @endif </td>
                                             <td>@if(@$value['reply']) {{@$value['reply']}} @else - @endif</td>
                                             <td>
                                                @if(@$value['is_reply']=='yes')
                                                Sent
                                                @else
                                                <a class="send_reply_cls" href="javascript:void(0)" ral_id="{{$value->id}}" ral_email="{{$value->email}}" ral_subject="{{$value->subject}}" ral_query="{{$value->message}}"><i class="fa fa-reply" title="Send Reply"></i></a>
                                                @endif
                                             </td>
                                         </tr>
                                         <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12  text-center">
                       &copy; Copyright 2021 Hagel Team. All Rights Reserved
                    </div>
                  
                </div>
            </div>
        </footer>

        <div id="sendReplyModel" class="modal fade" role="">
            <form method="post" id="send_reply_form" action="{{url('admin/contactUs/query/reply')}}">
                @csrf
                <input type="hidden" name="contact_us_id" id="contact_us_id" value="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title caption-subject theme-font-color bold z">Reply</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" required="" class="form-control" value="" id="user_email_id" disabled>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" required="" class="form-control" value="" id="subject_id" disabled>
                            </div>
                            <div class="form-group">
                                <label>Query</label>
                                <textarea type="text" required="" class="form-control" value="" id="query_id" disabled></textarea>
                            </div>
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea type="text" required="" name="reply" class="form-control" value=""></textarea>
                            </div>
                        </div>
                        <div class="modal-footer"> 
                            <button type="submit" id="send_reply_btn" class="btn btn-primary"> Send Reply</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @include('backend.common.footer')
        </div>
    </div>
    <div class="rightbar-overlay"></div>
            


   


<script type="text/javascript">
    $(document).on('click','.send_reply_cls', function(){
        $('#contact_us_id').val($(this).attr('ral_id'));
        console.log($(this).attr('ral_id'));
        $('#user_email_id').val($(this).attr('ral_email'));
        console.log($(this).attr('ral_email'));
        $('#query_id').val($(this).attr('ral_query'));
        console.log($(this).attr('ral_query'));
        $('#subject_id').val($(this).attr('ral_subject'));
        console.log($(this).attr('ral_subject'));
        $('#sendReplyModel').modal('show');
    })
</script>

<script type="text/javascript">
    $('#send_reply_form').validate({
        ignore:[],
        rules:{
            "reply":{
                required: true,
                maxlength: 5000
            }
        },
        messages: {
            "reply":{
                required: "Please enter reply",
                maxlength: "Maximum 5000 characters are allowed"
            }
        }
    })
</script>