@extends('layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content text-center p-md">
                        <h2>
                            <span class="text-navy text-uppercase">
                                @if($year != '')
                                    Fatture del {{$year}}
                                @else
                                    Tutte le Fatture
                                @endif

                            </span>
                        </h2>
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
                                <a href="{{route('invoice.create')}}" class="btn btn-w-m btn-primary">Nuova Fattura</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('invoices.all')}}" class="btn btn-w-m btn-primary">Tutte</a>
                            </div>
                        </div>
                    </div>
                    <!-- fine header -->

                    <div class="ibox-content">
                        <table id="table-works" style="font-size:12px" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="max-width:40px;">N.</th>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Importo</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fatture as $item)
                                <tr>
                                    <td style="max-width:40px;">{{$item->numero}}</td>
                                    <td>{{ $item->data->format('d/m/Y') }}</td>
                                    <td><h3 class="mb-0 mt-0">{{$item->customer->ragione_sociale}}</h3></td>
                                    <td>@money($item->totale)</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" target="_blank" href="{{route('invoice.pdf',['id'=> $item->id])}}">pdf</a>
                                    </td>
                                    <td>
                                        @if($year != '')
                                            <a class="elimina" href="{{route('invoice.delete',['id'=> $item->id])}}"><i class="fa fa-trash fa-2x text-danger"></i> </a>
                                        @endif
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
            $('#table-works').DataTable({
                responsive: true,
                pageLength: 100,
                order: [[ 0, "desc" ]], //order in base a order
                language:{ "url": "/js/plugins/dataTables/dataTable.ita.lang.json" }
            });

        });
    </script>
@stop