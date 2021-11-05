@extends('layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content text-center p-md">
                        <h2><span class="text-navy text-uppercase">{{$category->name}}</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">

                    <!-- header del box -->
                    <div class="ibox-title" style="padding-right:15px">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- nuovo post -->
                                <a href="{{route('post.create')}}" class="btn btn-w-m btn-primary">Nuovo Articolo</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <!-- nuova categoria -->
                                <a href="javascript:void(0)" onclick="get_modal('{{route('category.create')}}')" class="btn btn-w-m btn-primary">Aggiungi Categoria</a>
                                <!-- tutte le categorie -->
                                <a href="{{route('categories')}}" class="btn btn-w-m btn-primary ">Tutte le Categorie</a>
                            </div>
                        </div>
                    </div>
                    <!-- fine header -->

                    <div class="ibox-content">
                        <table id="table-categories" style="font-size:12px" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="width:20px;"></th>
                                <th style="max-width:40px;">Id</th>
                                <th>Titolo</th>
                                <th>Data</th>
                                <th data-orderable="false"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($category->posts as $post)
                                    <tr>
                                        <td style="width:20px;">
                                            <a href="javascript:void(0)" onclick="get_modal('{{route('post',['id'=>$post->id])}}')">
                                                <i class="fa fa-search fa-2x text-success"></i>
                                            </a>
                                        </td>
                                        <td style="max-width:40px;">{{$post->id}}</td>
                                        <td><h3 class="mb-0 mt-0"><a class="text-dark" href="{{route('post',['id'=>$post->id])}}">{{$post->name}}</a></h3></td>
                                        <td>{{$post->created_at->format('d/m/Y')}}</td>
                                        <td class="text-right">
                                            <a class="mr-2" href="javascript:void(0)" onclick="get_modal('{{route('link.create',['post_id' => $post->id])}}')">
                                                <i class="fa fa-link fa-2x text-dark"></i>
                                            </a>
                                            <a class="mr-2" href="javascript:void(0)" onclick="get_modal('{{route('video.create',['post_id' => $post->id])}}')">
                                                <i class="fa fa-video-camera fa-2x text-dark"></i>
                                            </a>
                                            <a class="mr-2" href="javascript:void(0)" onclick="get_modal('{{route('script.create',['post_id' => $post->id])}}')">
                                                <i class="fa fa-codepen fa-2x text-dark"></i>
                                            </a>
                                            <a class="mr-2" href="{{route('post.edit',['id'=> $post->id])}}"><i class="fa fa-edit fa-2x text-success"></i> </a>
                                            <a class="elimina" href="{{route('post.delete',['id'=> $post->id])}}"><i class="fa fa-trash fa-2x text-danger"></i> </a>
                                        </td>
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