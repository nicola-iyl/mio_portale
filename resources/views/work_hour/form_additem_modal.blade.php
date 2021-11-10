<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-left">Aggiungi ore a {{$work->name}}</h4>
        </div>
        <div class="modal-body">
            <form action="" method="post" id="form_add_work_hour" >
                {{ csrf_field() }}
                <input type="hidden" name="work_id" id="work_id" value="{{$work->id}}" />
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="qty">Data</label>
                            <input type="date" id="data" name="data" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label for="qty">Tempo in H</label>
                            <input type="text" id="qty" name="qty" class="form-control" />
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="desc">Descrizione</label>
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
    $("#form_add_work_hour").validate({
        rules: {
            work_id:{required:true},
            desc:{required:true},
            data:{required:true},
            qty:{required:true}

        },
        messages: {
            work_id:{required:'Questo campo è obbligatorio'},
            desc:{required:'Questo campo è obbligatorio'},
            data:{required:'Questo campo è obbligatorio'},
            qty:{required:'Questo campo è obbligatorio'}
        },
        submitHandler: function (form)
        {
            $.ajax({
                type: "POST",
                url: "{{route('work_hour.store')}}",
                data: $("#form_add_work_hour").serialize(),
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
    });
</script>