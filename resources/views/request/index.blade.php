@extends('layout.app',['title' => "الجنسيات",'subtitle'=>'قائمة الجنسيات'])



@section('contenter')
  <div class="row">
    <div class="col-2 text-start">
        {{-- <button
        type="button"
        class="btn btn-primary mb-3"
        data-bs-toggle="modal"
        data-bs-target="#modalCenter"
        id="createModalOpen" data-action="create"
        >
        اضافة تحليل
        </button> --}}
        <a href="{{url('/patient')}}" class="btn btn-danger  mb-3">رجوع</a>
      </div>

    </div>

    <!-- Bootstrap modals -->

            <x-shared.request.request-list :requests="$request->request()->orderBy('id', 'DESC')->get()"></x-shared.request.request-list>


    <!--/ Bootstrap modals -->
@endsection

