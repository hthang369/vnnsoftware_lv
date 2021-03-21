{!! Modal::start($modal) !!}
    {!! $form !!}
{!! Modal::end() !!}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('post_content'); </script>