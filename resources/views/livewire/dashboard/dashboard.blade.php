<x-slot name="title">
    {{ $page_title }}
</x-slot>


<div class="row g-4 mb-4">
    <div class="col-lg-12 mb-12 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Welcome to Rajulaw</h5>
                        <p class="mb-4">US Immigration Law
                            and Global ServiceGlobal ServiceGlobal Service</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Services</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="mb-0 me-2">{{ $services }}</h4>
                        </div>
                        <small>Total Services</small>
                    </div>
                    <span class="badge bg-label-primary rounded p-2">
                        <i class="bx bxs-check-square bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Team member</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="mb-0 me-2">{{ $team }}</h4>
                        </div>
                        <small>Total Team member </small>
                    </div>
                    <span class="badge bg-label-danger rounded p-2">
                        <i class="bx bxs-user-account bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Immigration News</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="mb-0 me-2">{{ $immegration }}</h4>
                        </div>
                        <small>Total Immigration News</small>
                    </div>
                    <span class="badge bg-label-success rounded p-2">
                        <i class="bx bx-news bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Guidelines</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="mb-0 me-2">{{ $guideline }}</h4>
                        </div>
                        <small>LTotal Guidelines</small>
                    </div>
                    <span class="badge bg-label-warning rounded p-2">
                        <i class="bx bx-book bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
