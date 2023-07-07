@extends('adminlte.fragment')

@section('style')
    {!! Html::style('bower/select2/dist/css/select2.min.css')!!}
    {!! Html::style('bower/datatables.net-dt/css/jquery.dataTables.min.css') !!}
    {!! Html::style('bower/datatables.net-fixedcolumns-dt/css/fixedColumns.dataTables.min.css') !!}
@endsection

@section('script')
    {!! Html::script('bower/select2/dist/js/select2.min.js') !!}
    {!! Html::script('bower/select2/dist/js/i18n/es.js') !!}
    {!! Html::script('bower/jquery-cascading-dropdown/dist/jquery.cascadingdropdown.min.js') !!}
    {!! Html::script('bower/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('bower/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') !!}

    {!! Html::script('bower/jquery-slimscroll/jquery.slimscroll.min.js') !!}
@endsection

@section('content')
    <h2 class="page-header">Reasignacion Presupuesto</h2>
    <div class="row">
        <div class="col-md-8">
            @include('estimate::kernel.reasign.elements.list_available_estimate')
        </div>
        <div class="col-md-4">
            @include('estimate::kernel.reasign.elements.control_searcher_estimate')
        </div>
    </div>
@endsection



