<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
<!-- container section start -->
<section id="container" class="">



    @include('layouts.top')
    <!--header end-->

    <!--sidebar start-->
    @include('layouts.nav')
    <!--sidebar end-->

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa fa-exclamation-circle"></i>Fraud Instances</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/">Home</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i> <a href="/fraudStats/home"> Frauds </a> </li>
                        @if($id!='home')
                            <li><i class="fa fa-key"></i>Token : {{$id}}</li>
                        @endif
                    </ol>
                </div>
            </div>
            <!-- page start-->
            @if($id!='home')
                <div class="my-wrap login-wrap">
                    <p>
                        <button class="btn btn-lg btn-primary" type="button" data-toggle="collapse" data-target="#metadata" aria-expanded="false" aria-controls="collapseExample">
                            Token Meta Data
                        </button>
                        <button class="btn btn-lg btn-danger" type="button" data-toggle="collapse" data-target="#log" aria-expanded="false" aria-controls="collapseExample">
                            Fraud Instances
                        </button>
                    </p>
                    <div class="collapse" id="metadata">
                        <div class="bs-callout bs-callout-success">
                            <h4>Token Id : {{$id}}</h4>
                            @foreach($data[0] as $key => $val)
                                <code>{{$key}}</code> : {{$val}}
                                <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="collapse" id="log">
                        <div class="bs-callout bs-callout-danger">
                            <h4>Fraud Instances</h4>
                            @foreach(array_slice($data, 1) as $key => $val)
                                <div class="bs-callout bs-callout-primary">
                                        <code>{{$key}}</code> : {{$val}} Instances
                                        <br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <h2>Enter the token Id you want to check frauds : <input type="number" id="token-id" placeholder="Token Id" required> <a class="btn btn-primary btn-lg" onclick="get()">Enter</a></h2>
                <br><center><h2>Or</h2></center><br>
                <h2>Your Tokens</h2>
                @foreach($ids as $key => $val)
                    <a class="btn btn-info btn-sm btn-mar" href="/fraudStats/{{$val}}">{{$val}}</a>
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
@include('layouts.scripts')
<script>
    function get() {
        var id = document.getElementById("token-id").value;
        if(id=="") return;
        console.log(id);
        window.location.href = "http://localhost:8000/fraudStats/" + id;
        return;
    }
</script>

</body>
</html>
