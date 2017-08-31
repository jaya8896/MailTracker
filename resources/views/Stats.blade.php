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
                    <h3 class="page-header"><i class="fa fa fa-bar-chart-o"></i> Token Stats</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/">Home</a></li>
                        <li><i class="fa fa-bar-chart-o"></i> <a href="/myStats"> Stats </a> </li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

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
    function get() {
        var id = document.getElementById("token-id").value;
        if(id=="") return;
        console.log(id);
        window.location.href = "http://localhost:8000/myStats/" + id;
        return;
    }

    function fetch(id){
        var b = document.getElementById("browser");
        var browser = b.options[b.selectedIndex].value;

        var o = document.getElementById("os");
        var os = o.options[o.selectedIndex].value;

        var d = document.getElementById("device");
        var device = d.options[d.selectedIndex].value;

        var start = document.getElementById("start").value;
        var bucket = document.getElementById("bucket").value;

        window.location.href = "http://localhost:8000/myStats/"+id+"?start="+start+"&bucket="+bucket+"&browser="+browser+"&os="+os+"&device="+device;
        return;
    }
</script>

</body>
</html>
