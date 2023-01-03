<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        <li class="{{ (\Request::route()->getName() == 'index') ? 'active' : '' }}" >
            <a class="d-flex align-items-center" href="{{url('/')}}">
                <i data-feather="home"></i>
                <span class="menu-item text-truncate" data-i18n="Analytics">اصدار شهادة</span>
            </a>
        </li>
        <li class=" {{ (\Request::route()->getName() == 'nationality.index') ? 'active' : '' }}" >
            <a class="d-flex align-items-center" href="{{url('/nationality')}}">
                <i data-feather='award'></i>
                <span class="menu-item text-truncate" data-i18n="Analytics">الجنسية</span>
            </a>
        </li>
        <li class="{{ (\Request::route()->getName() == 'identityType.index') ? 'active' : '' }}" >
            <a class="d-flex align-items-center" href="{{url('/identityType')}}">
                <i data-feather='briefcase'></i>
                <span class="menu-item text-truncate" data-i18n="Analytics">المستندات</span>
            </a>
        </li>
        <li class="{{ (\Request::route()->getName() == 'test.index') ? 'active' : '' }}" >
            <a class="d-flex align-items-center" href="{{url('/test')}}">
                <i data-feather='check-circle'></i>
                <span class="menu-item text-truncate" data-i18n="Analytics">التحاليل</span>
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
        <li class="{{ (\Request::route()->getName() == 'remove') ? 'active' : '' }}" >
            <a class="d-flex align-items-center" href="{{url('/remove')}}">
                <i data-feather='x-octagon'></i>
                <span class="menu-item text-truncate" data-i18n="Analytics">حدف سجلات </span>
            </a>
        </li>


      </ul>