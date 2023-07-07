<div class="box box-default">
    <div class="box-header">
        <i class="fa fa-search"></i>
        <h3 class="box-title">Buscar Presupuesto</h3>
    </div>

    <div class="box-body no-pad-top">
        <div class="box-body">
            <form id="form-search-estimates" autocomplete="off">
                <div class="form-group col-md-12">
                    <label for="prov">Aplicacion</label>
                    <select class="form-control input-sm" id="capp" name="capp">
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="prov">Unidad de Negocio</label>
                    <select class="form-control input-sm" id="uneg" name="uneg">
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="box-footer text-right">
        <button id="btn-search-estimates" class="btn btn-info">
            <span class="fa fa-save">Buscar Presupuesto</span>
        </button>
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function() {

        $('#btn-search-estimates').on('click', function(){
            formForms = $('#form-search-estimates');
            axios.post(`/roadmap/estimate/dt-available`, formForms.serialize())
                .then(function (response) {
                    dtAvailableEstimate.ajax.url('/roadmap/estimate/dt-available?'+formForms.serialize()).load();
                })
                .catch(function (error) {
                    toastrWarning(error);
                });
        });

        $('#capp').select2({
            ajax: {
                url: '/roadmap/application/combo-app',
                data: function (params) {
                    return {
                        srch: params.term,
                    };
                },
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.capp,
                                text: item.capp+' - '+item.napp
                            };
                        })
                    }
                },
                cache: true
            },
            allowClear: true,
            minimumInputLength: 3,
            placeholder: 'Aplicacion'
        });

        $('#uneg').select2({
            ajax: {
                url: '/roadmap/business-unit/combo-unit',
                data: function (params) {
                    return {
                        srch: params.term,
                    };
                },
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.corr,
                                text: item.corr+' - '+item.desc
                            };
                        })
                    }
                }
            },
            allowClear: true,
            placeholder: 'Unidad de Negocio'
        });

    });

</script>
