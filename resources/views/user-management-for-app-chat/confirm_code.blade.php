@extends('layouts.system-admin')

@section('title', 'Confirm code')

@section('sidebar')
    @parent
@endsection

@section('content')
    @if($submitCode !== 1)
        <form method="get">
            <button type="submit" name="sendmail" value="1">Sendmail</button>
        </form>
    @else
        <h3>Please check email and fill code in text box</h3>
        <form method="get" class="m-5">
            <input type="hidden" name="type" class="form-control text-center" max="9999" >
            <input type="number" name="code" class="form-control text-center" max="9999" >
            <button type="submit" class="btn btn-danger btn-block mt-4" id="submit_code_btn">Submit code for delete user</button>
            <button type="submit" value="" class="btn btn-warning btn-block mt-4" id="resent_btn">Resent</button>
        </form>
    @endif

@endsection
@section('script')
    <script>
        $("#resent_btn").click(function (e) {
            $("input[name=code]").val('');
            $("input[name=type]").val('resent');
        })
        $("#submit_code_btn").click(function (e) {
            $("input[name=type]").val('submit_code');
        })
    </script>
@endsection
