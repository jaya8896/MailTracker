<!DOCTYPE html>
<html lang="en">
@include('layouts.head');

@if($id=='home')
    <body>
    @else
    <body onload='SelectElement({{$b}},{{$o}},{{$d}},{{$start}},{{$bucket}});'>
    @endif
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
                        <li><i class="fa fa-bar-chart-o"></i> <a href="/myStats/home"> Stats </a> </li>
                        @if($id!='home')
                            <li><i class="fa fa-key"></i>Token : {{$id}}</li>
                        @endif
                    </ol>
                </div>
            </div>
            <!-- page start-->
            @if($id!='home')
                <h3> Start : <input type="number" id="start" placeholder="" required> &nbsp; &nbsp; Bucket : <input type="number" id="bucket" placeholder="" required> </h3>

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
                    </select>  &nbsp; &nbsp; &nbsp;
                </h3>
                <br>
                <a class="btn btn-primary btn-lg" onclick="fetch({{$id}})"> Submit </a>
                <br><br><br>

                <h1> Stats </h1>
                <div id="accordion" role="tablist" aria-multiselectable="false">
                    @php
                        ($i = 1)
                    @endphp
                    @foreach($data as $key=> $val)
                        <div class="card">
                            <div class="card-header" role="tab" id={{$i."head"}}>
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href={{"#"."collapse".$i}} aria-expanded="false" aria-controls={{"collapse".$i}}>
                                        <center>{{$key."   :   "}} <code>{{$val['count']}}</code></center>
                                    </a>
                                </h5>
                            </div>

                            <div id={{"collapse".$i}} class="collapse" role="tabpanel" aria-labelledby={{$i."head"}}>
                                <div class="card-block">
                                    @foreach($val['details'] as $data => $data_count)
                                       <center>{{$data."  :  ".$data_count}}</center> <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php
                            ($i++)
                        @endphp
                    @endforeach
                </div>

            @else
                <h2>Enter the token Id you want to view stats : <input type="number" id="token-id" placeholder="Token Id" required> <a class="btn btn-primary btn-lg" onclick="get()">Enter</a></h2>
                <br><center><h2>Or</h2></center><br>
                <h2>Your Tokens</h2>
                @foreach($ids as $key => $val)
                    <a class="btn btn-info btn-sm btn-mar" href="/myStats/{{$val}}">{{$val}}</a>
            @endforeach
        @endif
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

    function SelectElement(b,o,d,start,bucket) {
        var element = document.getElementById('browser');
        element.value = b;

        var element = document.getElementById('os');
        element.value = o;

        var element = document.getElementById('device');
        element.value = d;

        var element = document.getElementById('start');
        element.value = start;

        var element = document.getElementById('bucket');
        element.value = bucket;
    }
</script>

</body>
</html>
