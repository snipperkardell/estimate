<div class="box box-default">
    <div class="box-header">
        <i class="fa fa-list-ul"></i>
        <h3 class="box-title">Operaciones</h3>
    </div>

    <div class="box-body no-pad-top">
        <div class="box-body text-center">
            <a id="btn-home" class="btn btn-default">
                <i class="fa fa-home"></i> Volver
            </a>

{{--            <a id="btn-save-state" class="btn btn-primary">--}}
{{--                <i class="fa fa-save"></i> Reasignar--}}
{{--            </a>--}}
        </div>
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function() {
        // $('#btn-save-state').on('click', function(){
        //     send();
        // });

        $('#btn-home').on('click', function(){
            window.location.href = "/estimate/reasign/index";
        });

    });

    {{--function send () {--}}

    {{--    axios.post('/estimate/reasign/store/{{ $master->corr }}/{{ $master->cdtl }}')--}}
    {{--        .then(function (response) {--}}
    {{--            toastrSuccess();--}}
    {{--        })--}}
    {{--        .catch(function (error) {--}}
    {{--            toastrWarning(error);--}}
    {{--        });--}}
    {{--}--}}

</script>
