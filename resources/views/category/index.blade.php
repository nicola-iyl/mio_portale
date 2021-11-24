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
                                @include('buttons.add_category')
                            </div>
                            <div class="col-md-6 text-right">

                            </div>
                        </div>
                    </div>
                    <!-- fine header -->

                    <div class="ibox-content">
                        <table id="table-posts" style="font-size:12px" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="max-width:40px;">Id</th>
                                <th>Titolo</th>
                                <th data-orderable="false"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $cat)
                                <tr>
                                    <td style="max-width:40px;">{{$cat->id}}</td>
                                    <td><h3 class="mb-0 mt-0">{{$cat->name}}</h3></td>
                                    <td></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection