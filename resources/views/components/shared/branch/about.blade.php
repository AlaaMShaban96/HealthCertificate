<div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
     <!-- /User Card -->
     <div class="card border-primary">
        
        <div class="card-header">
            <h4 class="card-title">إحصائيات اليوم </h4>
            <div class="d-flex align-items-center">
                <p class="card-text me-25 mb-0">{{ date('Y-m-d') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-4 col-sm-6">
                <div class="card text-center">

                    <div class="card-body">
                        <div class="avatar bg-light-info p-50 mb-1">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-medium-5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </div>
                        </div>
                        <h2 class="fw-bolder">{{ $numberRequestToday }}</h2>
                        <p class="card-text">الشهادات</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-success p-50 mb-1">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-medium-5"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            </div>
                        </div>
                        <h2 class="fw-bolder">{{ $numberPatientToday }}</h2>
                        <p class="card-text">المرضي</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- User Card -->
    <div class="card">
        <div class="card-body">
            <div class="user-avatar-section">
                <div class="d-flex align-items-center flex-column">
                    <div class="avatar bg-light-danger avatar-xl">
                        <span class="avatar-content">
                            {{mb_substr($branch->name, 0, 2)  }}
                        </span>
                    </div>
                    {{-- <img class="img-fluid rounded mt-3 mb-2" src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="User avatar" width="110" height="110"> --}}
                    <div class="user-info text-center">
                        <h4>{{ $branch->name }}</h4>
                        <span class="badge bg-light-secondary">Author</span>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around my-2 pt-75">
                <div class="d-flex align-items-start me-2">
                    <span class="badge bg-light-primary p-75 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check font-medium-2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </span>
                    <div class="ms-75">
                        <h4 class="mb-0">{{ $branch->patients->count() }}</h4>
                        <small>عدد المرضي</small>
                    </div>
                </div>
                <div class="d-flex align-items-start">
                    <span class="badge bg-light-primary p-75 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase font-medium-2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                    </span>
                    <div class="ms-75">
                        <h4 class="mb-0">{{ $branch->requests->count() }}</h4>
                        <small>عدد طلبات استخراج الشهادة</small>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
   
</div>
