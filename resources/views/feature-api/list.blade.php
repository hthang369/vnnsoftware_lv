@extends('layouts.system-admin')

@section('title', 'Feature api')

@section('sidebar')
    @parent
@endsection

@section('dialog_confirm_delete')
    @parent
@endsection

@section('content')
    <a class="m-2 btn btn-primary" href="/system-admin/feature-api/new" role="button">+ Add New</a>
    @if(session()->has('deleted'))
        <div class="alert alert-success">
            <strong>Deleted!</strong>
        </div>
    @endif
    @if(count($list) == 0)
        <div class="alert alert-warning">
            <strong>Sorry!</strong> No Item Found.
        </div>
    @else

        <table class="table table-hover" style="table-layout: fixed; word-break: break-word">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Feature</th>
                <th scope="col">Api</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $i => $featureApi)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>{{$featureApi->feature}}</td>
                    <td>{{$featureApi->api}}</td>
                    <td>
                        <a class="btn btn-info" href="/system-admin/feature-api/detail/{{$featureApi->id}}" role="button">Detail</a>
                        <a class="btn btn-primary" href="/system-admin/feature-api/update/{{$featureApi->id}}" role="button">Update</a>
                        <button onclick="return callAjaxCheckDelete({{$featureApi->id}});"
                                type="button"
                                class="btn btn-danger"
                                role="button">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            function callAjaxCheckDelete(id) {
                $(".custom-delete").click(function () {
                    window.location.href = "{{Request::root()}}" + "/system-admin/feature-api/delete/" + id;
                });

                let mess = 'Are you sure you want to delete?';
                $.ajax({
                    type: 'GET',
                    async: false,
                    url: '/system-admin/role-has-feature-api/ajax-check-is-used-feature-api/' + id,
                    success: function (data) {
                        if (data.isUsed) {
                            mess = 'Data is in use, are you sure you want to delete it?';
                        }
                        $(".modal-body").text(mess);
                    }
                }).done(function () {
                    $('#exampleModal').modal('show');
                });
            }
        </script>
    @endif
@endsection

