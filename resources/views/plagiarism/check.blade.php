@extends('base')
@section('title')
    HỆ THỐNG SO KHỚP TÀI LIỆU
@endsection
@section('content')
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
@endsection
@section('script')
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
@endsection
