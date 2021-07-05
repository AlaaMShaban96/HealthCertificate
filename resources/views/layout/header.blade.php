<section>
    <div class="sidenav">
        <div  class="logo"><img src="{{asset('logo.svg')}}" style="width: 50%;"></div>
        {{-- <a href="{{url('/')}}" class="item {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i> الرئيسية </a> --}}
        <a href="{{url('/')}}" class="item {{ (\Request::route()->getName() == 'magazines') ? 'active' : '' }}"><i class="fa fa-dashboard"></i> اصدار شهادة </a>
        <a href="{{url('/nationality')}}" class="item {{ (\Request::route()->getName() == 'countries') ? 'active' : '' }}"><i class="fa fa-flag"></i>الجنسية </a>
        <a href="{{url('/identityType')}}" class="item {{ (\Request::route()->getName() == 'identityType') ? 'active' : '' }}"><i class="fa fa-briefcase"></i> المستندات </a>
        <a href="{{url('/patient')}}" class="item {{ (\Request::route()->getName() == 'ratings') ? 'active' : '' }}"><i class="fa fa-star"></i>الحالات </a>
        <a href="{{url('/test')}}" class="item {{ (\Request::route()->getName() == 'notes') ? 'active' : '' }}"><i class="fa fa-sticky-note-o"></i>التحاليل </a>
        <a href="{{url('/unique')}}" class="item {{ (\Request::route()->getName() == 'notes') ? 'active' : '' }}"><i class="fa fa-bug" aria-hidden="true"></i>تحليل منفرد </a>
    </div>
</section>
