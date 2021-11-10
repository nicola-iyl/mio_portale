<div class="col-md-6">
    @foreach($items as $item)
        <div class="row border pt-2 pb-2 mb-2">
            <div class="col-md-8">{{$item->desc}}</div>
            <div class="col-md-4">@money($item->imponibile)</div>
        </div>
    @endforeach
</div>
