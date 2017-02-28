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
                            <form class="form-horizontal" id="uploadKeywords" method="GET" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="Nom22">Chọn file: </label>  
                                        <div class="col-md-4">
                                            <input type="file" class="file" id="fileTxt" name="fileTxt">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label> 
                                        <div class="col-md-5">
                                             <div id="loading"></div>
                                             <div id="data"></div>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="send"></label>
                                      <div class="col-md-4">
                                      <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>

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
            $("#uploadKeywords").submit(function (e){
                load_data("fileName=" + $("#fileTxt").val());
                e.preventDefault(); //STOP default action
            }); 
                
            function load_data(data) {
                $('#loading').html("<img src='plagiarism/image/loading.gif'/>").fadeIn('fast'); 
                $.ajax({
                    type: "GET",
                    data : data,
                    url: "upload/keywords/loadding",
                    success: function(data_log) {
                        $('#loading').fadeOut('fast');
                        /*$("#data").html("<img style='height:30px' src='plagiarism/image/success.gif'/> Success").fadeIn('fast'); */
                        $("#data").html(data_log);
                    }
                })

                /*$.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         :  $("#uploadKeywords").attr('action'), // the url where we want to POST
                   // data        : formData, // our data object
                    //dataType    : 'json', // what type of data do we expect back from the server
                    encode          : true
                }).done(function(data) {
                    $('#loading').fadeOut('fast');
                    console.log(data); 
                });*/
            }
        });

    </script>
</body>
</html>
