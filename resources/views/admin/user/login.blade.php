@extends('base')
@section('title')
    ĐĂNG NHẬP
@endsection
@section('content')
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-horizontal">
                    <form class="form-horizontal" method="post" action="login">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                        <fieldset>
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
                                <label class="col-md-4 control-label" for="send"></label>
                                <div class="col-md-4">
                                    <button id="uploadFile" name="insertNews" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
