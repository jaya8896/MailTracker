<!DOCTYPE html>
<html lang="en">

@include('layouts.head');
<body>
<!-- container section start -->
<section id="container" class="">



    @include('layouts.top');
    <!--header end-->

    <!--sidebar start-->
    @include('layouts.nav');
    <!--sidebar end-->

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Generate Tokens</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/">Home</a></li>
                        <li><i class="fa fa-bars"></i>Generate</li>
                        <li><i class="fa fa-key"></i>ClickToken</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

                <div class="my-wrap">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="text" class="form-control" placeholder="Destination URL" id="desti" name="dest" autofocus required>
                    </div>
                    <br>
                    <a class="btn btn-info btn-lg btn-block" onclick="get({{Auth::user()}})">Generate</a>
                </div>


            <br><br>

            <div class="col-lg-6 my-wrap login-wrap">
                <section class="panel">
                    <div class="panel-body" id="open-token-generate"></div>
                </section>
            </div>

            <!-- page end-->
        </section>
    </section>


    <br><br>


    <!-- project team & activity end -->

</section>

<!--main content end-->
<!-- container section start -->

<!-- javascripts -->
@include('layouts.scripts');
<script>
    function get(idd) {
        if(document.getElementById("desti").value=="") {document.getElementById("open-token-generate").innerHTML = "Enter a Destination Url"; return;}
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "http://localhost:8000/tokens", true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.setRequestHeader("user_id", idd['id']);
        xhttp.setRequestHeader("pass", idd['password']);
        xhttp.setRequestHeader("dest",document.getElementById("desti").value);
        xhttp.send();

        xhttp.onreadystatechange = processRequest;

        function processRequest(e) {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var response = JSON.parse(xhttp.responseText);
                document.getElementById("open-token-generate").innerHTML = response['content'];
                document.getElementById("desti").value = "";
            }
        }
    }
</script>

</body>
</html>
