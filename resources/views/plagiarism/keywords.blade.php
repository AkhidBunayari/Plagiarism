@extends('base')
@section('title')
    THÊM KEYWORDS
@endsection
@section('content')
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-horizontal">
                    {{ showMessage() }}
                    <form class="form-horizontal" method="post" action="keywords">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Nom22">Chọn chủ đề</label>
                                <div class="col-md-4">
                                    <input id='txtCategory' class="form-control" list="categorys" name="browser" placeholder="Chọn chủ đề">
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
                                <label class="col-md-4 control-label" for="Nom22">Keywords: </label>  
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="txtKeyword">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="send"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary">Insert</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#messages").show(0).delay(1000).hide(500);
        });
    </script>
@endsection
