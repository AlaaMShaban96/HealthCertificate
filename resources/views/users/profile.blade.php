@extends('layout.app',['title' => "المستندات",'subtitle'=>'قائمة المستندات'])



@section('contenter')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <x-shared.user.about :user="$user"></x-shared.user.about>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                        <!-- User Pills -->
                        <ul class="nav nav-pills mb-2">
                            <li class="nav-item">
                                <a class="nav-link {{ $section=='logger'?'active':'' }} " href="{{ route('users.profile',['user'=>$user->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-3 me-50"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="fw-bold">السجل</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $section=='requests'?'active':'' }} " href="{{ route('users.profile',['user'=>$user->id,'section'=>'requests']) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-3 me-50"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="fw-bold">الشهادات الصحية</span>
                                </a>
                            </li>
                            
                        </ul>
                        <!--/ User Pills -->

                        <!-- Project table -->
                        @switch($section)
                            @case('logger')
                                <x-shared.user.logger :user="$user" ></x-shared.user.logger>
                                @break
                            @case('requests')
                                <x-shared.request.request-list :requests="$user->requests()->orderBy('created_at', 'DESC')->get()"></x-shared.request.request-list>
                                @break
                            @default
                                
                        @endswitch
                       

                        <!-- /Project table --> 
                    </div>
                    <!--/ User Content -->
                </div>
            </section>
        </div>
    </div>

@endsection
@section('script')

@endsection
