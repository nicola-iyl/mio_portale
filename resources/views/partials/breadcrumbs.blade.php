<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2 class="text-uppercase">
            {{ $title_page ?? '' }}
            @if(env('APP_DEBUG'))
                <span class="label label-danger ml-2">DEBUG</span>
            @else
                <span class="label label-success ml-2">ONLINE</span>
            @endif
        </h2>
        @section('breadcrumbs')
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <strong>{{ $title_page ?? '' }}</strong>
                </li>
            </ol>
        @show
    </div>
</div>