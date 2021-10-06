{!! Modal::start($modal) !!}
    {!! $form !!}
{!! Modal::end() !!}


@section('scripts')
<script>
$(document).ready(function() {
    $('#tablist').change(function(e) {
        $('#link_'+$(this).val()).tab('show')
    });
});
</script>
@endsection

