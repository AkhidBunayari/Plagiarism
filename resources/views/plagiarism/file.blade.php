@extends('base')
@section('title')
    THÔNG TIN
@endsection
@section('css')
    <link href="plagiarism/bootstrap-3.3.6/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        a.morelink {
            text-decoration:none;
            outline: none;
        }
        .morecontent span {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-horizontal">
                    {{ showMessage() }}
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Sinh viên</th>
                                <th>Tên file</th>
                                <th>Nội dung</th>
                                <th>Nội dung bảng</th>
                                <th>Tổng số từ</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sinh viên</th>
                                <th>Tên file</th>
                                <th>Nội dung</th>
                                <th>Nội dung bảng</th>
                                <th>Tổng số từ</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($files as $file)
                            <tr>
                                <td>{{ $file->user->username }}</td>
                                <td>{{ $file->name }}</td>
                                <td class="more">{{ $file->content }}</td>
                                <td class="more">{{ $file->table }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="plagiarism/js/jquery.dataTables.min.js"></script>
    <script src="plagiarism/bootstrap-3.3.6/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            var showChar = 300;
            var ellipsestext = "...";
            var moretext = "Xêm thêm";
            var lesstext = "Đóng";
            var t;

            $('.more').each(function() {
                var content = $(this).html();
                t =content;
                if(content.length > showChar) {

                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar-1, content.length - showChar);

                    var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                    $(this).html(html);
                }

            });

            $(".morelink").click(function(){
                alert(t);
                
               
               /* if($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();*/
                return false;
            });
        });
    </script>
@endsection