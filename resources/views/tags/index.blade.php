@extends('layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content text-center p-md">
                        <h2><span class="text-navy text-uppercase">Tags</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">

                    <!-- header del box -->
                    <div class="ibox-title" style="padding-right:15px">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- nuovo post -->
                                <a href="javascript:void(0)" onclick="get_modal('{{route('tags.create')}}')" class="btn btn-w-m btn-primary">Nuovo Tag</a>
                            </div>
                        </div>
                    </div>
                    <!-- fine header -->

                    <div class="ibox-content">
                        <table id="table-categories" style="font-size:12px" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th data-orderable="false"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td><a href="{{route('tags.delete',['id'=>$tag->id])}}"><i class="fa fa-trash fa-2x text-danger"></i> </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
    <script>
        $(document).ready(function ()
        {
            $('#table-categories').DataTable({
                responsive: true,
                pageLength: 100,
                order: [[ 1, "desc" ]], //order in base a order
                language:{ "url": "/js/plugins/dataTables/dataTable.ita.lang.json" }
            });

        });
    </script>
@stop