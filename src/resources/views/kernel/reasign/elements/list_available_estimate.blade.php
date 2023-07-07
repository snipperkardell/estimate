<div class="box box-default">
    <div class="box-header with-border">
        <i class="fa fa-list"></i>
        <h3 class="box-title">Lista Presupuesto</h3>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <input id="search-estimate" class="form-control input-sm" placeholder="BUSCAR">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
        </div>
    </div>
    <div class="box-body no-pad-top">

        <table class="display compact nowrap" id="dt-available-estimate">
            <thead>
            <tr>
                <th width="10%" class="text-center">APLICACION</th>
                <th width="10%" class="text-center">GESTION</th>
                <th width="10%" class="text-center">MES</th>
                <th width="25%" class="text-center">DESCRIPCIÓN</th>
                <th width="15%" class="text-right">SUCURSAL</th>
                <th width="10%" class="text-right">CANTIDAD</th>
                <th width="15%" class="text-right">UNIDAD</th>
                <th width="15%" class="text-right">PRESUPUESTO (BS)</th>
                <th class="text-center"></th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    let dtAvailableEstimate;
    $(document).ready(function() {
        dtAvailableEstimate = $('#dt-available-estimate').DataTable({
            ordering: false,
            paging: false,
            scrollY: 350,
            dom: 'lrtip',
            scrollX: true,
            fixedColumns: {
                leftColumns: 2,
                rightColumns: 2
            },
            columnDefs: [
                {
                    targets: 0,
                    data: "capp"
                },
                {
                    targets: 1,
                    data: "nges"
                },
                {
                    targets: 2,
                    data: "nmth"
                },
                {
                    targets: 3,
                    data: "detl"
                },
                {
                    targets: 4,
                    class: "text-right",
                    data: "nung"
                },
                {
                    targets: 5,
                    class: "text-right",
                    data: 'cant'
                },
                {
                    targets: 6,
                    class: "text-right",
                    data: 'nuni'
                },
                {
                    targets: 7,
                    class: "text-right",
                    data: function(data){
                        value = 0;
                        if(data.blnc){
                            amount = roundNumber(data.blnc);
                            value = `${amount} <b>${data.amon}</b>`;
                        }
                        return value;
                    }
                },
                {
                    targets: 8,
                    class: "text-center",
                    data: function(data){
                        action = '<a href="/estimate/reasign/kardex/'+data.corr+'/'+data.cdtl+'"><i class="fa fa-arrow-circle-o-right"></i></a>';
                        return action;
                    }
                },
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
                select: {
                    rows: {
                        _: "<br>Usted ha seleccionado %d filas",
                        0: "<br>Haga clic en una fila para seleccionarlo",
                        1: "<br>Solo 1 fila seleccionada"
                    }
                },
            }
        });
    });

    $('#search-estimate').on('keyup change', function () {
        dtAvailableEstimate.search(this.value).draw();
    });

</script>
