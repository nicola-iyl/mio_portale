@extends('layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content text-center p-md">
                        <h2><span class="text-navy text-uppercase">Clienti</span></h2>
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
                                <a href="{{route('customer.create')}}" class="btn btn-w-m btn-primary">Nuovo Cliente</a>
                            </div>
                        </div>
                    </div>
                    <!-- fine header -->

                    <div class="ibox-content">
                        <table id="table-customers" style="font-size:12px" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="width:20px;"></th>
                                <th style="max-width:40px;">Id</th>
                                <th>Ragione sociale</th>
                                <th>Indirizzo</th>
                                <th>P Iva</th>
                                <th>Cod.Fisc.</th>
                                <th>Tel</th>
                                <th data-orderable="false"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td style="width:20px;">
                                        <a href="javascript:void(0)" onclick="get_modal('{{route('customer',['id'=>$customer->id])}}')">
                                            <i class="fa fa-search fa-2x text-success"></i>
                                        </a>
                                    </td>
                                    <td style="max-width:40px;">{{$customer->id}}</td>
                                    <td><h3 class="mb-0 mt-0"><a class="text-dark" href="{{route('customer',['id'=>$customer->id])}}">{{$customer->ragione_sociale}}</a></h3></td>
                                    <td>{{ $customer->indirizzo }}</td>
                                    <td>{{ $customer->p_iva }}</td>
                                    <td>{{ $customer->codice_fiscale }}</td>
                                    <td>{{ $customer->tel }}</td>
                                    <td class="text-right">

                                        <a class="mr-2" href="{{route('customer.edit',['id'=> $customer->id])}}"><i class="fa fa-edit fa-2x text-success"></i> </a>
                                        <a class="elimina" href="{{route('customer.delete',['id'=> $customer->id])}}"><i class="fa fa-trash fa-2x text-danger"></i> </a>
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
            $('#table-customers').DataTable({
                responsive: true,
                pageLength: 100,
                order: [[ 1, "desc" ]], //order in base a order
                language:{ "url": "/js/plugins/dataTables/dataTable.ita.lang.json" }
            });

        });
    </script>
@stop