<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-left">Aggiungi Lavoro</h4>
        </div>
        <div class="modal-body">
            <form action="" method="post" id="form_add_work" >
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="customer_id">Cliente</label>
                            <select name="customer_id" id="customer_id" class="form-control" >
                                <option value="">seleziona</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->ragione_sociale}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="qty">Data</label>
                            <input type="date" id="data" name="data" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label for="qty">Nome</label>
                            <input type="text" id="name" name="name" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label for="qty">Descrizione</label>
                            <input type="text" id="desc" name="desc" class="form-control" />
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg w-100" type="submit">
                                <i class="fa fa-dot-circle-o"></i> SALVA
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
        </div>
    </div>

</div>
<script>
    $("#form_add_work").validate({
        rules: {
            customer_id:{required:true},
            name:{required:true},
            desc:{required:true},
            data:{required:true}
        },
        messages: {
            customer_id:{required:'Questo campo ?? obbligatorio'},
            name:{required:'Questo campo ?? obbligatorio'},
            desc:{required:'Questo campo ?? obbligatorio'},
            data:{required:'Questo campo ?? obbligatorio'}
        },
        submitHandler: function (form)
        {
            $.ajax({
                type: "POST",
                url: "{{route('work.store')}}",
                data: $("#form_add_work").serialize(),
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
                error: function (){ alert("Si ?? verificato un errore! Riprova!"); }
            });
        }
    });
</script>