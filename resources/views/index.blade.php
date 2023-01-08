@extends('layout.app',['title' => "الشهادة الصحية",'subtitle'=>'اصدار'])
@section('style')
<style>
  /* .input-style{
    margin-left: 5%;
    margin-top: 3%;

  } */
  /* #my_camera{
        width: 320px;
        height: 240px;
        /* border: 1px solid black; */
    } */
  /* #results { padding:20px; border:1px solid; background:#ccc; } */
  </style>
@endsection
@section('contenter')

        <div class="content-body ">
         @if (isset(auth()->user()->branch_id))
            <x-branch.dashboard :nationalitys="$nationalitys" :tests="$tests" :identityTypes="$identityTypes"></x-branch.dashboard>
         @else
            <x-admin.dashboard></x-admin.dashboard>
         @endif
        </div>

<!-- END: Content-->
@endsection
@section('script')
<script src="{{ asset('new/assets/js/webcam.js')}}"></script>
<script src="{{ asset('new/assets/js/take_snapshot.js')}}"></script>

@endsection
