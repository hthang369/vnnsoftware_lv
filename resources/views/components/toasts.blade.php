<div class="fixed-top p-3" style="left: inherit;">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
      <div class="toast-header bg-info text-light">
        {{-- <img src="..." class="rounded mr-2" alt="..."> --}}
        <span class="mr-2"><i class="fas fa-exclamation-circle"></i></span>
        <strong class="mr-auto">Notification</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        {!! $slot !!}
      </div>
    </div>
  </div>