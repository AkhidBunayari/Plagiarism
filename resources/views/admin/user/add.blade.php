@extends('base')
@section('title')
    THÊM THÀNH VIÊN
@endsection
@section('content')
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-horizontal">
                    {{ showError($errors->all()) }}
                    <form class="form-horizontal" method="post" action="add/user">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Nom22">Email: </label>  
                                <div class="col-md-4">
                                    <input type="email" class="form-control" name="txtEmail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Nom22">Username: </label>  
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="txtUserName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Nom22">Password: </label>  
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="txtPass">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Nom22">Password Again: </label>  
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="txtPassAgain">
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
