@extends('layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight blog">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">

                    <!-- header del box -->
                    <div class="ibox-title" style="padding-right:15px">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 text-right">
                                <a href="{{ url()->previous() }}" class="btn btn-w-m btn-primary ">Indietro</a>
                            </div>
                        </div>
                    </div>
                    <!-- fine header -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="float-right">
                            @foreach($post->getTags() as $tag)
                                <button class="btn btn-white btn-xs" type="button">{{$tag}}</button>
                            @endforeach

                        </div>
                        <div class="pb-3 pt-2">
                            <span class="text-muted"> {{$post->created_at->format('d-F-Y')}}</span>
                            <h2>
                                {{$post->name}}
                            </h2>
                        </div>
                        <p>{{$post->desc}}</p>
                        @if($post->scripts->count() > 0)
                            <div class="ibox ">
                                @foreach($post->scripts as $script)
                                    <div class="ibox-content mb-2">
                                        <a href="{{route('script.delete',['id'=>$script->id])}}" type="button" class="close elimina">&times;</a>
                                        <p>{{$script->desc}}&nbsp;</p>
                                        <div><code><pre>{{$script->code}}</pre></code></div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if($post->links->count() > 0)
                            <div class="ibox ">
                                @foreach($post->links as $item)
                                    <div class="ibox-content mb-2">
                                        <a href="{{route('link.delete',['id'=>$item->id])}}" type="button" class="close elimina">&times;</a>
                                        <p>{{$item->name}}&nbsp;</p>
                                        <p><strong><a href="{{$item->url}}" target="_blank">{{$item->url}}</a></strong></p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if($post->videos->count() > 0)
                            <div class="ibox ">
                                @foreach($post->videos as $item)
                                    <div class="ibox-content mb-2">
                                        <a href="{{route('video.delete',['id'=>$item->id])}}" type="button" class="close elimina">&times;</a>
                                        <p>{{$item->name}}&nbsp;</p>
                                        <p><strong><a href="{{$item->link}}" target="_blank">{{$item->link}}</a></strong></p>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <hr>
                        <div class="row">
                            <div class="col-lg-12">

                                <h2>Comments:</h2>
                                <div class="social-feed-box">
                                    <div class="social-avatar">
                                        <a href="" class="float-left">
                                            <img alt="image" src="img/a1.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a href="#">
                                                Andrew Williams
                                            </a>
                                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                                        </div>
                                    </div>
                                    <div class="social-body">
                                        <p>
                                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                            default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                            default model text.
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>


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
            $('#table-categories').DataTable({
                responsive: true,
                pageLength: 100,
                order: [[ 1, "desc" ]], //order in base a order
                language:{ "url": "/js/plugins/dataTables/dataTable.ita.lang.json" }
            });

        });
    </script>
@stop