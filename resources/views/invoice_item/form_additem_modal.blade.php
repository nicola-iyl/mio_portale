<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-left">Aggiungi voce Fattura</h4>
        </div>
        <div class="modal-body">
            <form action="" method="post" id="form_add_invoice_item" >
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="work_id">Lavoro</label>
                            <select name="work_id" id="work_id" class="form-control">
                                <option value="">seleziona</option>
                                @foreach($works as $work)
                                    <option value="{{$work->id}}">{{$work->name}} ({{$work->oreLavorate()}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="imponibile">Imponibile</label>
                            <input type="text" id="imponibile" name="imponibile" class="form-control" />
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
    $("#form_add_invoice_item").validate({
        rules: {
            work_id:{required:true},
            imponibile:{required:true},

        },
        messages: {
            work_id:{required:'Questo campo è obbligatorio'},
            imponibile:{required:'Questo campo è obbligatorio'},
        },
        submitHandler: function (form)
        {
            $.ajax({
                type: "POST",
                url: "{{route('invoice_item.add')}}",
                data: $("#form_add_invoice_item").serialize(),
                dataType: "html",
                success: function (data)
                {
                    if (data !== "error")
                    {
                        $('#work-list').html(data);
                    }
                    else{ alert( 'Errore' ); }
                },
                error: function (){ alert("Si è verificato un errore! Riprova!"); }
            });
        }
    });
</script>