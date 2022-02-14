<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('ijabocrop/ijaboCropTool.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontgoogle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/ekko-lightbox/ekko-lightbox.css')}}">
</head>
<body>

    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col-md-6">
                  <div class="card">
                      <div class="card-header bg-primary text-white">Add new product</div>
                      <div class="card-body">
                          <form action="{{route('save.product')}}" method="post" enctype="multipart/form-data" id="form">
                            @csrf
                              <div class="form-group">
                                  <label for="">Product name</label>
                                  <input type="text" name="product_name" class="form-control" placeholder="Enter product name">
                                  <span class="text-danger error-text product_name_error"></span>
                              </div>
                              <div class="form-group">
                                  <label for="">Product image</label>
                                  <input type="file" name="product_image" class="form-control">
                                  <span class="text-danger error-text product_image_error"></span>
                              </div>
                              <div class="img-holder"></div>
                              <button type="submit" class="btn btn-primary">Save Product</button>
                          </form>
                      </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">All Products</div>
                    <div class="card-body" id="AllProducts">

                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset('admin/dist/js/adminlte.js')}}"></script>
<script src="{{ asset('admin/dist/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('admin/dist/js/demo.js')}}"></script>

<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{ asset('admin/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{ asset('admin/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
    <script>
        $(function(){

            $('#form').on('submit', function(e){
                e.preventDefault();

                var form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    success:function(data){
                        if(data.code == 0){
                            $.each(data.error, function(prefix,val){
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            $(form)[0].reset();
                            // alert(data.msg);
                            fetchAllProducts();
                        }
                    }
                });
            });

            //Reset input file
            $('input[type="file"][name="product_image"]').val('');
            //Image preview
            $('input[type="file"][name="product_image"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });

            //Fetch all products
            fetchAllProducts();
            function fetchAllProducts(){
                $.get('{{route("fetch.products")}}',{}, function(data){
                     $('#AllProducts').html(data.result);
                },'json');
            }

        })
    </script>
</body>
</html>
