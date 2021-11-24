<div class="ibox">
    <div class="ibox-title">
        <h4>Ricerca post programmazione</h4>
    </div>
    <div class="ibox-content">
        <form action="{{route('search.post')}}" method="GET" id="form_ricerca">
            <div class="form-group mb-0">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" id="search" class="form-control" placeholder="da ricercare" />
                    </div>
                    <div class="col-md-6">
                        <label> <input type="radio" value="name" name="type" checked=""> <i></i> per titolo </label>
                        <label> <input type="radio"  value="desc" name="type"> <i></i> per titolo e descrizone </label>
                        <label> <input type="radio"  value="tag" name="type"> <i></i> per tag </label>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-lg w-100" type="submit">
                            <i class="fa fa-dot-circle-o"></i> CERCA
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>