@extends('layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content text-center p-md">
                        <h2><span class="text-navy text-uppercase">Lavori da Fatturare</span></h2>
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
                                <a href="{{route('work.create')}}" class="btn btn-w-m btn-primary">Nuovo Lavoro</a>
                            </div>
                        </div>
                    </div>
                    <!-- fine header -->

                    <div class="ibox-content">
                        <table id="table-works" style="font-size:12px" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="max-width:40px;">Id</th>
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Ore</th>
                                <th></th>
                                <th></th>
                                <th data-orderable="false"></th>
                                <th>Stato</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($works as $work)
                                <tr>
                                    <td style="max-width:40px;">{{$work->id}}</td>
                                    <td>{{ ($work->data != '') ? $work->data->format('d/m/Y'):'' }}</td>
                                    <td><h3 class="mb-0 mt-0">{{$work->name}}</h3></td>
                                    <td>{{ $work->oreLavorate() }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{route('work.pdf_ore',['id'=> $work->id])}}">pdf ore</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="">aggiungi ore</a>
                                    </td>
                                    <td class="text-right">
                                        <a class="mr-2" href="{{route('work',['id'=> $work->id])}}"><i class="fa fa-search fa-2x text-success"></i> </a>
                                        <a class="mr-2" href="{{route('work.edit',['id'=> $work->id])}}"><i class="fa fa-edit fa-2x text-success"></i> </a>
                                        <a class="elimina" href="{{route('work.delete',['id'=> $work->id])}}"><i class="fa fa-trash fa-2x text-danger"></i> </a>
                                    </td>
                                    <td>{{ $work->status }}</td>
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
            $('#table-works').DataTable({
                responsive: true,
                pageLength: 100,
                order: [[ 0, "desc" ]], //order in base a order
                language:{ "url": "/js/plugins/dataTables/dataTable.ita.lang.json" }
            });

        });
    </script>
@stop