<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    @if (!isset(auth()->user()->branch_id) && auth()->user()->role=="super-admin" )

        <li class=" navigation-header">
            <span data-i18n="Apps &amp; Pages">لوحة التحكم </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
        </li>
        <li class="{{ (\Request::route()->getName() == 'index') ? 'active' : '' }}" >
            <a class="d-flex align-items-center" href="{{url('/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
            </a>
        </li>
        <li class="nav-item has-sub {{ (\Request::route()->getName() == 'nationality.index') ||  (\Request::route()->getName() == 'identityType.index') ||  (\Request::route()->getName() == 'identityType.index') || (\Request::route()->getName() == 'branches.index')   ? 'open' : '' }} " style="">
            <a class="d-flex align-items-center" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span class="menu-title text-truncate" data-i18n="Datatable">الاعدادات</span></a>
            <ul class="menu-content">
                <li class=" {{ (\Request::route()->getName() == 'nationality.index') ? 'active' : '' }}" >
                    <a class="d-flex align-items-center" href="{{url('/nationality')}}">
                        <i data-feather='circle'></i>
                        <span class="menu-item text-truncate" data-i18n="Analytics">الجنسية</span>
                    </a>
                </li>
                <li class="{{ (\Request::route()->getName() == 'identityType.index') ? 'active' : '' }}" >
                    <a class="d-flex align-items-center" href="{{url('/identityType')}}">
                        <i data-feather='circle'></i>
                        <span class="menu-item text-truncate" data-i18n="Analytics">المستندات</span>
                    </a>
                </li>
                <li class="{{ (\Request::route()->getName() == 'test.index') ? 'active' : '' }}" >
                    <a class="d-flex align-items-center" href="{{url('/test')}}">
                        <i data-feather='circle'></i>
                        <span class="menu-item text-truncate" data-i18n="Analytics">التحاليل</span>
                    </a>
                </li>
                <li class="{{ (\Request::route()->getName() == 'branches.index') ? 'active' : '' }}" >
                    <a class="d-flex align-items-center" href="{{url('/branches')}}">
                        <i data-feather='circle'></i>
                        <span class="menu-item text-truncate" data-i18n="Analytics"> الفروع</span>
                    </a>                                                         
                </li>
                <li class="{{ (\Request::route()->getName() == 'users.index') ? 'active' : '' }}" >
                    <a class="d-flex align-items-center" href="{{url('/users')}}">
                        <i data-feather='circle'></i>
                        <span class="menu-item text-truncate" data-i18n="Analytics"> مستخدمين</span>
                    </a>                                                         
                </li>
            </ul>
        </li>        
    @endif

        @if (isset(auth()->user()->branch_id))
        
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">المختبارات</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
            </li>
            <li class="{{ (\Request::route()->getName() == 'index') ? 'active' : '' }}" >
                <a class="d-flex align-items-center" href="{{url('/')}}">
                    <i data-feather="home"></i>
                    <span class="menu-item text-truncate" data-i18n="Analytics">اصدار شهادة</span>
                </a>
            </li>
            
            <li class="{{ (\Request::route()->getName() == 'patient.index') ? 'active' : '' }}" >
                <a class="d-flex align-items-center" href="{{url('/patient')}}">
                    <i data-feather='meh'></i>
                    <span class="menu-item text-truncate" data-i18n="Analytics">الحالات</span>
                </a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'unique') ? 'active' : '' }}" >
                <a class="d-flex align-items-center" href="{{url('/unique')}}">
                    <i data-feather='pie-chart'></i>
                    <span class="menu-item text-truncate" data-i18n="Analytics">تحليل منفرد </span>
                </a>
            </li>
            @if (auth()->user()->role=="admin" || auth()->user()->role=="monitor")
                <li class="{{ (\Request::route()->getName() == 'remove') ? 'active' : '' }}" >
                    <a class="d-flex align-items-center" href="{{url('/remove')}}">
                        <i data-feather='x-octagon'></i>
                        <span class="menu-item text-truncate" data-i18n="Analytics">حدف سجلات </span>
                    </a>
                </li>
            @endif

            
        @endif
        



      </ul>