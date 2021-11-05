<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        @if($post)
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-left">{{$post->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="text-right">
                    @foreach($post->getTags() as $tag)
                        <button class="btn btn-white btn-xs" type="button">{{$tag}}</button>
                    @endforeach
                </div>
                {{$post->desc}}
                @if($post->scripts->count() > 0)
                    <div class="ibox">
                        @foreach($post->scripts as $script)
                            <div class="ibox-content">
                                <p>{{$script->desc}}</p>
                                <div><pre><code>{{$script->code}}</code></pre></div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            <div class="modal-body">
                Errore!... Post non trovato.
            </div>
        @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
            </div>
    </div>

</div>