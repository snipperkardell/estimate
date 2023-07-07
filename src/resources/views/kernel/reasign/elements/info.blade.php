<div id="app-info" class="box box-default">
    <div class="box-header with-border">
        <i class="fa fa-info-circle"></i>
        <h3 class="box-title">Información Partida</h3>
    </div>

    <div class="box-body">
        <table class="table table-striped table-condensed">
            <tr>
                <th width="35%">DETALLE</th>
                <td width="65%" class='no-padding'>
                    {{ $master->detl }}
                </td>
            </tr>
            <tr>
                <th width="35%">APLICACION</th>
                <td width="65%" class='no-padding'>
                    {{ $master->capp }}
                </td>
            </tr>
            <tr>
                <th width="35%">GESTION</th>
                <td width="65%" class='no-padding'>
                    {{ $master->nges }}
                </td>
            </tr>
            <tr>
                <th width="35%">MES</th>
                <td width="65%" class='no-padding'>
                    {{ $master->nmth }}
                </td>
            </tr>
            <tr>
                <th width="35%">CANTIDAD</th>
                <td width="65%" class='no-padding'>
                    {{ $master->cant }}
                </td>
            </tr>
            <tr>
                <th width="35%">UNIDAD</th>
                <td width="65%" class='no-padding'>
                    {{ $master->nuni }}
                </td>
            </tr>
            <tr>
                <th width="35%">SUCURSAL</th>
                <td width="65%" class='no-padding'>
                    {{ $master->nung }}
                </td>
            </tr>
            <tr>
                <th width="35%">PRESUPUESTO</th>
                <td width="65%" class='no-padding'>
                    {{ $master->blnc }} <b>BOB</b>
                </td>
            </tr>
            <tr>
                <th width="35%">ESTADO</th>
                <td width="65%" class='no-padding'>
                    @if($master->stte == 2)
                        REASIGNADO
                    @endif
                </td>
            </tr>

        </table>
    </div>
</div>

