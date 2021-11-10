@extends('layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">

                    <!-- header del box -->
                    <div class="ibox-title">

                        <!-- Indietro -->
                        <a href="{{ url()->previous() }}" class="btn btn-w-m btn-primary">Indietro</a>

                    </div>
                    <!-- fine header -->

                    <div class="ibox-content">
                        <form action="" method="POST" id="{{ $form_name }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label for="numero">N.</label>
                                        <input type="number" name="numero" id="numero" value="{{$numero}}" class="form-control mb-2" />
                                    </div>
                                    <div class="col-md-7">
                                        <label>Cliente*</label>
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            <option value="">seleziona</option>
                                            @foreach($customers as $item)
                                                <option value="{{$item->id}}">{{$item->ragione_sociale}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="d-block">Data*</label>
                                        <input type="date" name="data" id="data" class="form-control mb-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="btn btn-primary" href="javascript:void(0)" onclick="get_modal('{{route('invoice_item.add_item')}}')" >aggiungi voce</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="work-list">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 offset-md-8">
                                        <span>* campi obbligatori</span>
                                        <br><br>
                                        <button class="btn btn-primary btn-lg w-100" type="submit">
                                            <i class="fa fa-dot-circle-o"></i> SALVA
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
    <!-- per la select multipla -->
    <script>
        $(".select_tags").select2({
            theme: 'bootstrap4',
        });
    </script>
    <!-- -->
    <script>
        $("#{{$form_name}}").validate({
            rules: {
                numero:{required:true},
                customer_id:{required:true},
                data:{required:true}
            },
            messages: {
                numero:{required:'Questo campo è obbligatorio'},
                customer_id:{required:'Questo campo è obbligatorio'},
                data:{required:'Questo campo è obbligatorio'}
            },
            submitHandler: function (form)
            {
                $.ajax({
                    type: "POST",
                    url: "{{route('invoice.store')}}",
                    data: $("#{{$form_name}}").serialize(),
                    dataType: "json",
                    success: function (data)
                    {
                        if (data.result === 1)
                        {
                            alert(data.msg);
                            $(location).attr('href', data.url);
                        }
                        else{ alert( data.msg ); }
                    },
                    error: function (){ alert("Si è verificato un errore! Riprova!"); }
                });
            }
        });
    </script>
@endsection