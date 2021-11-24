@extends('layout')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                @include('partials.form_search_post')
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">

                    <!-- header del box -->
                    <div class="ibox-title" style="padding-right:15px">
                        <div class="row">
                            <div class="col-md-6">
                                @include('buttons.add_post')
                            </div>
                            <div class="col-md-6 text-right">
                                @include('buttons.add_category')
                                @include('buttons.all_categories')
                            </div>
                        </div>
                    </div>
                    <!-- fine header -->

                    <div class="ibox-content">
                        @include('partials.post_list_table',['posts' => $posts])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection