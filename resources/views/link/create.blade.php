<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Link</h4>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="{{ $form_name }}">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" id="post_id" value="{{$post_id}}" />
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="d-block">
                                Titolo
                            </label>
                            <input type="text" name="name" id="name" class="form-control"  />
                        </div>
                        <div class="col-md-12">
                            <label class="d-block">
                                Url
                            </label>
                            <input type="text" name="url" id="url" class="form-control"  />
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
    $("#{{$form_name}}").validate({
        rules: {
            url:{required:true},
        },
        messages: {
            url:{required:'Questo campo è obbligatorio'},
        },
        submitHandler: function (form)
        {
            $.ajax({
                type: "POST",
                url: "{{route('link.store')}}",
                data: $("#{{$form_name}}").serialize(),
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