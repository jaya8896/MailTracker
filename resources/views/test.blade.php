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
                    <h3 class="page-header"><i class="fa fa fa-magic"></i> My Tokens</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/">Home</a></li>
                        <li><i class="fa fa-magic"></i>My Tokens</li>
                        <li><i class="fa fa-key"></i>{{$type}}</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->








            <table class="table table-bordered">
                <thead>
                <tr class="bg-inverse">
                    <th>Token id</th>
                    <th>Created at</th>
                    <th>Count</th>
                    <th>Type</th>
                    <th>Dest Url</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $item)
                    <tr class="bg-info">
                        <td ><a href="/logs/{{$item["id"]}}">{{$item["id"]}}</a> </td>
                        <td>{{$item["created_at"]}}</td>
                        <td>{{$item["opens"]}}</td>
                        @if($item["dest_url"])
                            <td>Click</td>
                            <td>{{$item["dest_url"]}}</td>
                        @else
                            <td colspan="2">Open</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
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

</body>
</html>
