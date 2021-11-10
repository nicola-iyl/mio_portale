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
                                <a href="javascript:void(0)" onclick="get_modal('{{route('work.create')}}')" class="btn btn-w-m btn-primary">Nuovo Lavoro</a>
                            </div>
                        </div>
                    </div>
                    <!-- fine header -->

                    <div class="ibox-content">
                        <table id="table-works" style="font-size:12px" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Cliente</th>
                                <th>Ore</th>
                                <th data-orderable="false"></th>
                                <th data-orderable="false"></th>
                                <th data-orderable="false"></th>
                                <th>Fatturato</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($works as $work)
                                <tr>
                                    <td>{{$work->id}}</td>
                                    <td>{{ ($work->data != '') ? $work->data->format('d/m/Y'):'' }}</td>
                                    <td>{{$work->name}}</td>
                                    <td>{{$work->customer->ragione_sociale}}</td>
                                    <td>{{ $work->oreLavorate() }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" target="_blank" href="{{route('work.pdf_ore',['id'=> $work->id])}}">
                                            pdf ore
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="get_modal('{{route('work_hour.create',['work_id'=>$work->id])}}')">
                                            aggiungi ore
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <a class="elimina" href="{{route('work.delete',['id'=> $work->id])}}"><i class="fa fa-trash fa-2x text-danger"></i> </a>
                                    </td>
                                    <td>
                                        <select id="select-fatturato" name="select-fatturato">
                                            <option value="0" >NO</option>
                                            <option value="2" >SI</option>
                                        </select>
                                        <button onclick="changeStatus()" class="btn btn-sm btn-success">Aggiorna</button>
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
        function changeStatus()
        {
            let value = $('#select-fatturato').val();
            alert($('#select-fatturato').val());
            return
            $.ajax({
                type: "GET",
                url: "/work/change_status/{{$work->id}}/"+value,
                data:{},
                dataType: "json",
                success: function (data)
                {
                    if (data.result === 1)
                    {
                        alert(data.msg);
                        window.location.reload();
                    }
                    else{ alert( data.msg ); }
                },
                error: function (){ alert("Si è verificato un errore! Riprova!"); }
            });
        }
    </script>
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