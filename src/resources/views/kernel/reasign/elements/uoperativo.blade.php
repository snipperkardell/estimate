<div id="editing" class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Reajustar Presupuesto</h3>
    </div>
    <div class="box-body">
        <form id="form-reg" autocomplete="off">
            <table class="table table-condensed table-striped" width="100%">
                <tr>
                    <th width="35%">PRESUPUESTO</th>
                    <td width="65%" class='no-padding'>
                        {!! Former::number('refr', '')
                                  ->class('form-control input-sm text-uppercase') !!}
                    </td>
                </tr>
                <tr>
                    <th width="35%">CANTIDAD</th>
                    <td width="65%" class='no-padding'>
                        {!! Former::number('cant', '')
                                  ->class('form-control input-sm text-uppercase') !!}
                    </td>
                </tr>
                <tr>
                    <th width="35%">PERIODO</th>
                    <td width="65%" class='no-padding'>
                        {!! Former::date('pred', '')
                                  ->class('form-control input-sm text-uppercase') !!}
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="box-footer text-right">
        <button id="btn-create" class="btn btn-info">
            <span class="fa fa-save"> Reajustar Presupuesto</span>
        </button>
    </div>
</div>

<script type="application/javascript">

    $(document).ready(function() {
        $('#btn-create').on('click', function(){
            send();
        });
    });

    function send () {

        $("#btn-create").prop("disabled", true);
        formForms = $('#form-reg');
        axios.post('/estimate/reasign/update/{{ $master->corr }}/{{ $master->cdtl }}', formForms.serialize())
            .then(function (response) {
                $("#btn-create").prop("disabled", false);
                formForms.trigger("reset");
                toastrSuccess();
                window.location.href = "/estimate/reasign/kardex/{{ $master->corr  }}/"+response.data;
            })
            .catch(function (error) {
                $("#btn-create").prop("disabled", false);
                toastrWarning(error);
            });
    }

</script>
