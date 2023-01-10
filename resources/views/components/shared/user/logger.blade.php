{{ $logs->links('pagination.bootstrap-4') }}

<div class="card">
    <h4 class="card-header">سجل حركة المستخدم</h4>
    <div class="card-body pt-1">
        <ul class="timeline ms-50">
            @foreach ($logs as $log)

                @switch($log->action)
                    @case('login')
                        <li class="timeline-item">
                            <span class="timeline-point  timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>تسجيل الدخول</h6>
                                    <span class="timeline-event-time me-1">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $log->massage }}</p>
                            </div>
                        </li>
                        @break
                    @case('logout')
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>تسجيل خروج</h6>
                                    <span class="timeline-event-time me-1">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $log->massage }}</p>
                            </div>
                        </li>
                        @break
                    @case('store')
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6> عملية تسجيل </h6>
                                    <span class="timeline-event-time me-1">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $log->massage }}</p>
                            </div>
                        </li>
                        @break
                    @case('update')
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6> عملية تعديل </h6>
                                    <span class="timeline-event-time me-1">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $log->massage }}</p>
                            </div>
                        </li>
                        @break
                    @case('destroy')
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6> عملية حدف </h6>
                                    <span class="timeline-event-time me-1">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $log->massage }}</p>
                            </div>
                        </li>
                        @break
                    @case('print')
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6> عملية طباعة </h6>
                                    <span class="timeline-event-time me-1">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $log->massage }}</p>
                            </div>
                        </li>
                        @break
                    @case('unique')
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6> عملية  تحديدالتحليل المنفرد </h6>
                                    <span class="timeline-event-time me-1">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $log->massage }}</p>
                            </div>
                        </li>
                        @break
                    @case('selected')
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6> عملية اختيار التحليل العام </h6>
                                    <span class="timeline-event-time me-1">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $log->massage }}</p>
                            </div>
                        </li>
                        @break

                    @default 
                    
                @endswitch
            @endforeach
        </ul>
    </div>
</div>
