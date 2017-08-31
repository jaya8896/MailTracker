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
                        <li><i class="fa fa-bar-chart-o"></i> <a> All </a> </li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <h3> Browser : <select id="browser">
                    <option value="true">True</option>
                    <option value="false" selected>False</option>
                </select> &nbsp; &nbsp;
                OS : <select id="os">
                    <option value="true">True</option>
                    <option value="false" selected>False</option>
                </select> &nbsp; &nbsp;
                Device : <select id="device">
                    <option value="true">True</option>
                    <option value="false" selected>False</option>
                </select>  &nbsp; &nbsp;
                Type : <select id="type">
                    <option value="1">Open Tokens</option>
                    <option value="2">Click Tokens</option>
                    <option value="" selected>All</option>
                </select>
            </h3>
            <br>
            <a class="btn btn-primary btn-lg" onclick="fetch()"> Submit </a>
            <br><br><br>

            <h1> Stats </h1>
            <div id="accordion" role="tablist" aria-multiselectable="false">
                @foreach($data as $i => $val)
                    <div class="card">
                        <div class="card-header" role="tab" id={{$i."head"}}>
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordion" href={{"#"."collapse".$i}} aria-expanded="false" aria-controls={{"collapse".$i}}>
                                    <center>{{"TokenID   :   "}} <code>{{$val['id']}}</code> &nbsp;&nbsp; {{"Count   :   "}} <code>{{$val['count']}}</code></center>
                                </a>
                            </h5>
                        </div>

                        <div id={{"collapse".$i}} class="collapse" role="tabpanel" aria-labelledby={{$i."head"}}>
                            <div class="card-block">
                                <b>Token Data :</b>
                                <center>{{"Token ID"."  :  "}}<code>{{$val['id']}}</code></center> <br>
                                <center>{{"Total Count"."  :  "}}<code>{{$val['count']}}</code></center> <br>
                                <center>{{"Unique Count"."  :  "}}<code>{{$val['unique_count']}}</code></center> <br>
                                <center>{{"Destination Url"."  :  "}}<code>{{$val['dest_url']}}</code></center>
                                @if($val['details'])
                                    <br> <br>
                                    <b>Details :</b>
                                @endif
                                @foreach($val['details'] as $data => $data_count)
                                    <center>{{$data."  :  ".$data_count}}</center> <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
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
    function fetch(){
        var b = document.getElementById("browser");
        var browser = b.options[b.selectedIndex].value;

        var o = document.getElementById("os");
        var os = o.options[o.selectedIndex].value;

        var d = document.getElementById("device");
        var device = d.options[d.selectedIndex].value;

        var t = document.getElementById("type");
        var type = t.options[t.selectedIndex].value;

        window.location.href = "http://localhost:8000/myStats/"+"?type="+type+"&browser="+browser+"&os="+os+"&device="+device;
        return;
    }
</script>

</body>
</html>
