@extends('components.system-admin.create')

@section('header_page')
<h2 class="card-header px-0">
    @lang($headerPage) : {{ data_get($data, 'role.name')}}
</h2>
@endsection

@section('form_content')
    {!! Form::hidden('role_id', data_get($data, 'role.id')) !!}
   <x-table
        responsive
        bordered
        hover
        :sectionCode="$sectionCode"
        :items="data_get($data, 'rows')"
        :fields="data_get($data, 'fields')"
        :total="data_get($data, 'total')"
        :pages="data_get($data, 'pages')"
        :currentPage="data_get($data, 'currentPage')"
        :from="data_get($data, 'from')"
        :to="data_get($data, 'to')"
        >
        @yield('table_row')
    </x-table>
@endsection
