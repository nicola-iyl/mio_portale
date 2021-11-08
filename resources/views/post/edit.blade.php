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
                           <div class="col-md-6">
                              <label>Categoria*</label>
                              <select name="category_id" id="category_id" class="form-control">
                                 <option value="">seleziona</option>
                                 @foreach($categories as $cat)
                                    <option value="{{$cat->id}}" {{($post->category_id == $cat->id) ? 'selected':''}}>{{$cat->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-6">
                              <label class="d-block">Titolo*</label>
                              <input type="text" name="name" id="name" value="{{$post->name}}" class="form-control mb-2" />
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-6">
                              <label class="d-block">Tags</label>
                              <select id="tags" name="tags[]" class="select_tags form-control" multiple="multiple">
                                 @foreach($tags as $tag)
                                    @if(in_array($tag->name,$tags_array))
                                       <option value="{{$tag->name}}" selected>{{$tag->name}}</option>
                                    @else
                                       <option value="{{$tag->name}}">{{$tag->name}}</option>
                                    @endif

                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-6">
                              <label>Testo*</label>
                              <textarea name="desc" id="desc" rows="15" class="form-control mb-2"  >{{$post->desc}}</textarea>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-6">
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
               name:{required:true},
               category_id:{required:true},
               desc:{required:true}
           },
           messages: {
               name:{required:'Questo campo è obbligatorio'},
               category_id:{required:'Questo campo è obbligatorio'},
               desc:{required:'Questo campo è obbligatorio'}
           },
           submitHandler: function (form)
           {
               $.ajax({
                   type: "POST",
                   url: "{{route('post.update',['id' => $post->id])}}",
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