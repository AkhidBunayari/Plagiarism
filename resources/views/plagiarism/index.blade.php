<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ asset('/') }}" />
    <title>Plagiarism Checker DTU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="DTU icon" href="plagiarism/image/DTU.ICO">
    <link rel="stylesheet" type="text/css" href="plagiarism/css/bootstrap.min.css">
    <link rel="stylesheet" href="plagiarism/bootstrap-fileinput/css/fileinput.min.css" />
    <link rel="stylesheet" type="text/css" href="plagiarism/css/myStyle.css">
   
    <script type="text/javascript" src="plagiarism/js/jquery.min.js"></script>
    <script type="text/javascript" src="plagiarism/js/bootstrap.min.js"></script>
    <script src="plagiarism/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
    <script type="text/javascript" src="plagiarism/js/general.js"></script>
    <script type="text/javascript" src="plagiarism/js/general.size.js"></script>
    <script type="text/javascript" src="plagiarism/js/actions.js"></script>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row zsx">
                <div class="col-lg-12 animated lightSpeedIn">
                    <p class="vcenter">
                    <h1> HỆ THỐNG SO KHỚP TÀI LIỆU</h1>
                    <h3>Duy Tân University</h3>
                    </p>
                </div>
            </div>
        </div>
</header>
    <div class="container" style="padding-top: 20px">
        <div class="row">
        <div class="col-lg-12" >
            <div class="panel panel-default" >
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="Nom22">Chọn chủ đề</label>
                                        <div class="col-md-4">
                                            <input id='txtCategory' class="form-control" list="categorys" name="browser" placeholder="Kiểm tra với chủ đề">
                                            <datalist id="categorys">
                                                <option value="Công Nghệ Thông Tin">
                                                <option value="Chính Trị">
                                                <option value="Du Lịch">
                                                <option value="Hoá Học">
                                                <option value="Hình Học">
                                                <option value="Kinh Tế">
                                                <option value="Khoa Học">
                                                <option value="Lịch Sử">
                                                <option value="Tin Học">
                                                <option value="Toán Tin">
                                                <option value="Vật Lý">
                                                <option value="Văn Học">
                                                <option value="Thế Giới">
                                                <option value="Tiểu Thuyết">
                                                <option value="Xã Hội">
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="Nom22">Chọn file: </label>  
                                        <div class="col-md-4">
                                            <input type="file" class="file" name="fImage">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                             <div id="loading"></div>
                                             <div  id="data"></div>
                                        </div>
                                    </div>
                                    
                                    

                                    <!-- Button -->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="send"></label>
                                      <div class="col-md-4">
                                       
                                        
                                    </div>
                                </div>

                            </fieldset>
                        </form>
<button id="uploadFile" name="insertNews" class="btn btn-primary">Kiểm tra</button>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
    </div>
    <script>
        function reSize() {
            var n = $("body").width() / 30;
            $("h1").css('fontSize', n + "pt");
            $("h3").css('fontSize', (n/20) * 4.2 + "pt");
            }
        $(window).on("resize", reSize);
        $(document).ready(reSize);

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-70761127-6', 'auto');  ga('send', 'pageview');

    </script>
    <script>
        $(document).ready(function() {
            $("#uploadFile").click(function (){
                load_data();
            }); 

            function load_data() {
                $('#loading').html("<img src='plagiarism/image/loading.gif'/>").fadeIn('fast'); 
                $.ajax({
                    type: "GET",
                    url: "load/db",
                    success: function(data_log) {
                        $('#loading').fadeOut('fast');
                        $("#data").html(data_log);
                    }
                })
            }
        });
    </script>
</body>
</html>
