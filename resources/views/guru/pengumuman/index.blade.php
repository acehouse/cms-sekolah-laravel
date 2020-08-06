@extends('guru/templates/index')
@section('js')
<script src='{{asset('assets/js/controller/guru-pengumuman.js')}}'></script>
@stop
@section('content')
<!-- end: SPANEL CONFIGURATION MODAL FORM -->
<!-- start: PAGE HEADER -->
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        {!! Breadcrumbs::render('gurupengumuman'); !!}
        <div class="page-header">
            <h1>
                {{$title}} <br />
                <small>Tulis pengumuman di situs website SMA Negeri <%test%></small>
            </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
<!-- end: PAGE HEADER -->
<!-- start: PAGE CONTENT -->
<div class="row" ng-controller="pengumuman">
    <div class="col-md-12">
        <!-- start: BASIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><%alert.msg%></alert>
                <a class="btn btn-green add-row" href="{{route('guru.pengumuman.create')}}">
                    Add New <i class="fa fa-plus"></i>
                </a>
                <div class="pull-right col-sm-5">
                    <input class="form-control col-md-12" ng-model="query"  placeholder="Search">
                </div>
                <table id="sample-table-1" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Judul Pengumuman</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th class="hidden-xs center">Aksi Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="status in data| filter:paginate" ng-if="data.length > 0">
                            <td><% status['judul_pengumuman'] %></td>
                            <td><% status['tanggal'] %></td>
                            <td><% status['penulis'] %></td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a data-original-title="Edit" data-placement="top" class="btn btn-xs btn-teal tooltips" href="{{url('guru/pengumuman')}}/<% status['id_pengumuman']%>/edit"><i class="fa fa-edit"></i></a>
                                    <a data-original-title="Remove" data-placement="top" class="btn btn-xs btn-bricky tooltips" href="#" ng-click="delete(status['id_pengumuman'])"><i class="fa fa-times fa fa-white"></i></a>
                                </div>
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="btn-group">
                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li role="presentation">
                                                <a href="{{url('guru/pengumuman')}}/<% status['id_data']%>/edit" tabindex="-1" role="menuitem">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#" tabindex="-1" role="menuitem" ng-click="delete(status['id_pengumuman'])">
                                                    <i class="fa fa-times"></i> Remove 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr ng-if="data.length == 0">
                            <td colspan="4" class="center">Belum Ada Data</td>
                        </tr>
                    </tbody>
                </table>
                <pagination total-items="totalItems" ng-model="currentPage"
                            max-size="10" boundary-links="true"
                            items-per-page="numPerPage" class="pagination-sm">
                </pagination>
            </div>
        </div>
    </div>
    @stop