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
    {!! Html::script('bower/datatables.net-select/js/dataTables.select.min.js') !!}
@endsection

@section('content')
    <h2 class="page-header">Autorizacion Cotizacion</h2>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header"><i class="fa fa-inbox"></i> CARGAR PLANTILLA DE PRESUPUESTOS</li>
                </ul>
                <div class="tab-content no-padding">
                    <div class="tab-pane active content">
                        {!! Former::open_for_files()
                                  ->method('POST')
                                  ->action(url('estimate/load-template/store'))
                                  ->autocomplete('off')
                                  ->id('data') !!}
                        <br>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="input-group">
                                {!! Former::select('type', 'TIPO PRESUPUESTO')
                                                    ->class('form-control select2')
                                                    ->placeholder('Seleccione opcion')
                                                    ->required()
                                                    ->fromQuery(\OnDezk\Estimate\App\Models\Local\Concept::getEstimateType(), 'desc', 'code')
                                                     !!}
                                {!! Former::file('temp', 'PLANTILLA')->accept('cvs', 'xls')->required() !!}
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-cogs"></i></button>
                                </div>
                            </div>
                        </div>
                        {!! Former::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

