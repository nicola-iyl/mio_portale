<table id="table-posts" style="font-size:12px" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width:20px;"></th>
            <th style="max-width:40px;">Id</th>
            <th>Titolo</th>
            <th>Data</th>
            <th data-orderable="false"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td style="width:20px;">
                <a href="javascript:void(0)" onclick="get_modal('{{route('post',['id'=>$post->id])}}')">
                    <i class="fa fa-search fa-2x text-success"></i>
                </a>
            </td>
            <td style="max-width:40px;">{{$post->id}}</td>
            <td><h3 class="mb-0 mt-0"><a class="text-dark" href="{{route('post',['id'=>$post->id])}}">{{$post->name}}</a></h3></td>
            <td>{{$post->created_at->format('d/m/Y')}}</td>
            <td class="text-right">
                <a class="mr-2" href="javascript:void(0)" title="aggiungi link" onclick="get_modal('{{route('link.create',['post_id' => $post->id])}}')">
                    <i class="fa fa-link fa-2x text-dark"></i>
                </a>
                <a class="mr-2" href="javascript:void(0)" title="aggiungi video" onclick="get_modal('{{route('video.create',['post_id' => $post->id])}}')">
                    <i class="fa fa-video-camera fa-2x text-dark"></i>
                </a>
                <a class="mr-2" href="javascript:void(0)" title="aggiungi script" onclick="get_modal('{{route('script.create',['post_id' => $post->id])}}')">
                    <i class="fa fa-codepen fa-2x text-dark"></i>
                </a>
                <a class="mr-2" href="{{route('post.edit',['id'=> $post->id])}}"><i class="fa fa-edit fa-2x text-success"></i> </a>
                <a class="elimina" href="{{route('post.delete',['id'=> $post->id])}}"><i class="fa fa-trash fa-2x text-danger"></i> </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@section('js_script')
    <script>
        $(document).ready(function ()
        {
            $('#table-posts').DataTable({
                responsive: true,
                pageLength: 100,
                order: [[ 1, "desc" ]], //order in base a order
                language:{ "url": "/js/plugins/dataTables/dataTable.ita.lang.json" }
            });

        });
    </script>
@stop