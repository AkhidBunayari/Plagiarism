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
    @yield('css')
    <link rel="stylesheet" type="text/css" href="plagiarism/css/myStyle.css">
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row zsx">
                <div class="col-lg-12 animated lightSpeedIn">
                    <p class="vcenter">
                    <h1>@yield('title')</h1>
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
                    <li><a href="files">Thông tin</a></li>
                    <li><a href="logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
<!-- JavaScripts -->
<script src="plagiarism/js/jquery-1.11.2.min.js"></script>
<script src="plagiarism/bootstrap-3.3.6/js/bootstrap.min.js"></script>
<script src="plagiarism/js/resize.js"></script>
@yield('script')
</body>
</html>