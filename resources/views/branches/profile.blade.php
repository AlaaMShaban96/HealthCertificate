@extends('layout.app',['title' => "المستندات",'subtitle'=>'قائمة المستندات'])



@section('contenter')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <x-shared.branch.about :branch="$branch"></x-shared.branch.about>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                        <!-- User Pills -->
                        <ul class="nav nav-pills mb-2">
                            <li class="nav-item">
                                <a class="nav-link {{ !$security?'active':'' }} " href="{{ route('branches.profile',['branch'=>$branch->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-3 me-50"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="fw-bold">المستخدمين</span></a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ $security?'active':'' }}" href="{{ route('branches.profile',['branch'=>$branch->id,'security'=>true]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock font-medium-3 me-50"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <span class="fw-bold">الحماية</span>
                                </a>
                            </li> --}}



                        </ul>
                        <!--/ User Pills -->

                        <!-- Project table -->
                        @if ($security)
                            <x-shared.branch.security></x-shared.branch.security>
                        @else
                        <div class="card">
                            <h4 class="card-header">قائمة المستخدمين</h4>
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <x-shared.user.user-list :users="$branch->users"></x-shared.user.user-list>
                                </div>
                            </div>
                        </div> 
                        @endif

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
