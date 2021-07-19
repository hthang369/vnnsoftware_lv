<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('common.dialog_confirm_title')}}</h5>
        <button type="button" class="close btnClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="text_mess">{!! __('common.action_question_delete') !!}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" onclick="">Ok</button>
        <button type="button" class="btn btn-secondary btn-sm btnClose" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
<script>
$(document).ready(function() {
    $('.btnClose').on('click', function() {
        $('#confirmDialogDelete').modal('hide')
    });
});
function callDelete(url) {
    $.ajax({
        type: 'DELETE',
        async: false,
        url: url,
        success: function (data) {
            if (data.success) {
                $('#text_mess').text(data.message)
            } else {
                $('#text_mess').text(data.errors)
            }
        }
    });
}
</script>
