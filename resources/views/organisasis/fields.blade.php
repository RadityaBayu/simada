<!-- Pid Field -->
<div class="form-group col-sm-6 row">
    {!! Form::label('pid', 'Induk Organisasi:') !!}
    {!! Form::select('pid', [],  null, ['class' => 'form-control', 'onchange' => '$("#jenis").val("").trigger("change")']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6 row">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Field -->
<div class="form-group col-sm-6 row">
    {!! Form::label('jenis', 'Jenis:') !!}
    {!! Form::select('jenis', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6 row">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Aktif Field -->
<div class="form-group col-sm-6 row">
    {!! Form::label('aktif', 'Aktif:') !!} &nbsp;
    <div class="radio">
        {!! Form::radio('aktif', 1, isset($organisasi) ? $organisasi->aktif == 1 : false) !!} Ya
        {!! Form::radio('aktif', 0, isset($organisasi) ? $organisasi->aktif == 0 : false) !!} Tidak
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('organisasis.index') !!}" class="btn btn-default">Cancel</a>
</div>


@section('scripts')
<script>
    $('#pid').select2({
        ajax: {
            url: "<?= url('api/organisasis') ?>",
            dataType: 'json',
            processResults: function (data) {
            // Transforms the top-level key of the response object from 'items' to 'results'
            return {
                results: data.data
            };
            }
        },
        theme: 'bootstrap' ,
    })

    $('#jenis').select2({
        ajax: {
            url: "<?= url('api/jenisopds') ?>",
            dataType: 'json',
            data: function(d) {
                let pidSelect2 = $("#pid").select2("data")
                d.isFromOrganisasiItSelf = true
                d.level = pidSelect2.length > 0 ? pidSelect2[0].level : null
                return d
            },
            processResults: function (data) {
            // Transforms the top-level key of the response object from 'items' to 'results'
            return {
                results: data.data
            };
            }
        },
        theme: 'bootstrap' ,
    })
</script>

@if(isset($organisasi))
<script>
    App.Helpers.defaultSelect2($('#pid'), `${$('[base-path]').val()}/api/organisasis/<?= $organisasi->pid ?>`,"id","nama",() => {
        App.Helpers.defaultSelect2($('#jenis'), `${$('[base-path]').val()}/api/jenisopds/<?= $organisasi->jenis ?>`,"id","nama",() => {            
        })
    })
</script>
@endif
@endsection