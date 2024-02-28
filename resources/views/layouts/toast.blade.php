<div class="toast-container position-fixed top-0 end-0 p-3 ">
    <div id="liveToast" class="toast @if (session('status')) fade show @endif text-bg-{{session('status')}}" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{session('message')}}
            </div>
            <button type="button" class="btn-close btn-close-danger me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        
</div>
</div>