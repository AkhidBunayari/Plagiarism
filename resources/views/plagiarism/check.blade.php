<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <base href="{{ asset('/') }}" />
    <title>Plagiarism Checker DTU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="DTU icon" href="plagiarism/images/DTU.ICO">
    <!-- Styles -->
    <link href="plagiarism/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="plagiarism/css/myStyle.css">
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
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#zsxnavcollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
        <!-- <a class="navbar-brand" href="#top">TheBombHome</a> -->
            </div>
            <div class="collapse navbar-collapse pull-right" id="zsxnavcollapse">
                <ul class="nav navbar-nav">
                    <li><a href="check/plagiarism">Plagiarism</a></li>
                    <li><a href="add/user">Thành viên</a></li>
                    <li><a href="keywords">Keywords</a></li>
                    <li><a href="logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-horizontal">
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
                                <input type="file" id="file1"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12" id="result" style="text-align: center; margin: 1em 0;">
                                 <!-- <img src="plagiarism/images/processing.gif"/> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="send"></label>
                            <div class="col-md-4">
                                <button id="uploadFile" name="insertNews" class="btn btn-primary">Kiểm tra</button>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    
<!-- JavaScripts -->
<script src="plagiarism/js/jquery-1.11.2.min.js"></script>
<script src="plagiarism/bootstrap-3.3.6/js/bootstrap.min.js"></script>
<script src="plagiarism/js/resize.js"></script>
<script>
    var filename = '';
    
    $('#uploadFile').click(function () {
        upload();
    });
    function upload() {
        var file_data = $('#file1').prop('files')[0];
        var txtCate = $('#txtCategory').val();
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('txtCategory', txtCate);
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });
        $('#result').html('<img src="plagiarism/images/processing.gif"/>');
        $.ajax({
            url: "{{url('check/plagiarism')}}", // point to server-side PHP script
            data: form_data,
            type: 'POST',
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,
            success: function (data) {
                if (data.fail) {
                    /*$('#result').html('<img src="plagiarism/images/error.gif"/>');*/
                    $('#result').html(data.errors['file']);
                    /*alert(data.errors['file']);*/
                }
                else {
                    filename = data;
                    $('#result').html(data);
                }
            },
            error: function (xhr, status, error) {
               /* alert(xhr.responseText);*/
                $('#result').html(xhr.responseText);
            }
        });
    }
    function removeFile() {
        if (filename != '')
            if (confirm('Are you sure want to remove profile picture?'))
                $.ajax({
                    url: "{{url('check/plagiarism')}}/" + filename, // point to server-side PHP script
                    type: 'GET',
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,
                    success: function (data) {
                        $('#result').html('<img width="100%" height="100%" src="plagiarism/images/default.jpg"/>');
                        filename = '';
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
    }
</script>
</body>
</html>