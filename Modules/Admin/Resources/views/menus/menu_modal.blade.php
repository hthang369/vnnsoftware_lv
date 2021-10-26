{!! Modal::start($data['modal']) !!}
    {!! $data['form'] !!}
{!! Modal::end() !!}

@push('scripts')
<script>
$(document).ready(function() {
    $('#tablist').change(function(e) {
        $('#link_'+$(this).val()).tab('show')
    });
});
</script>
@endpush
