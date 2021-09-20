<x-form method="POST" route="laka-log.store">
    {!! Form::hidden('files[]', data_get($data,'name')) !!}
    <x-button :variant="$data->status == 1 ? secondary : primary" text="Parse" type="submit" :disabled="$data->status == 1 ? true : false"/>
</x-form>

