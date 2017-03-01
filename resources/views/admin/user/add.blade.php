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
                    <h1> THÊM THÀNH VIÊN</h1>
                    <h3>Duy Tân University</h3>
                    </p>
                </div>
            </div>
        </div>
    </header>
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
    
<!-- JavaScripts -->
<script src="plagiarism/js/jquery-1.11.2.min.js"></script>
<script src="plagiarism/bootstrap-3.3.6/js/bootstrap.min.js"></script>
<script src="plagiarism/js/resize.js"></script>
<script>
    $(document).ready(function() {
        $("#messages").show(0).delay(1000).hide(500);
    });
</script>

</body>
</html>