@extends('new.layout.app',['title' => "الحالات",'subtitle'=>'قائمة الحالات'])



@section('contenter')
  <div class="row">
    <div class="col-12">

      <div class="col-xxl mb-3 text-end">
        <div class="card ">
          {{-- <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Basic with Icons</h5>
          </div> --}}
          <form action="{{url('patient')}}" method="GET">

          <div class="card-body row">
              <div class="col-lg-3 mb-3">
                <label class="form-label-lg fw-bold" for="basic-icon-default-fullname ">الي تاريخ</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text "><i class="bx bx-user"></i></span>
                  <input class="form-control" type="date" placeholder="dd-mm-yyyy"  value="{{request('date[end]')}}" name="date[end]" tabindex='4'   id="html5-date-input">
                </div>
              </div>
              <div class="col-lg-3 mb-3">
                <label class="form-label-lg fw-bold" for="basic-icon-default-fullname ">  من تاريخ</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text "><i class="bx bx-user"></i></span>
                  <input class="form-control" type="date" placeholder="dd-mm-yyyy"  value="{{request('date[start]')}}" name="date[start]" tabindex='3'  id="html5-date-input">
                </div>
              </div>
              <div class="col-lg-3 mb-3">
                <label class="form-label-lg fw-bold" for="basic-icon-default-fullname ">اسم المريض</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text "><i class="bx bx-user"></i></span>
                  <input type="text" class="form-control" value="{{request('name')}}" name="name" tabindex='2' id="basic-icon-default-fullname" placeholder=" اسم المريض " aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                </div>
              </div>
              <div class="col-lg-3 mb-3">
                <label class="form-label-lg fw-bold" for="basic-icon-default-fullname ">رقم الإصال</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text "><i class="bx bx-user"></i></span>
                  <input type="text" class="form-control" value="{{request('request_number')}}" name="request_number" tabindex='1' id="basic-icon-default-fullname" placeholder="البحت برقم الإصال" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">

                  <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt bx-tada' ></i></button>
                </div>
              </div>
          </div>
        </form>

        </div>
      </div>
    </div>


    </div>

    <!-- Bootstrap modals -->
    <div class="card">
        {{-- <h5 class="card-header">Table Basic</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Actions</th>
                <th></th>
                <th>تاريخ الميلاد</th>
                <th>الاسم</th>
                <th>الرقم</th>


              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($patients as $patient)
                <tr>
                        <td>
                            <form action="{{url('/patient/'.$patient->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    {{-- <a class="dropdown-item" href="{{url('/patient/'.$patient->id)}}"><i class="bx bx-edit-alt me-1"></i>الملف الشخصي</a> --}}

                                    <a class="dropdown-item"

                                       href="{{url('/patient/'.$patient->id)}}"><i class="bx bx-edit-alt me-1"></i>تعديل</a>

                                    <button  class="dropdown-item delete" type="submit"><i class="bx bx-trash me-1"></i> حدف</button>
                                </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <a  id="createModalOpen"
                                            data-bs-toggle="modal" data-bs-target="#modalCenter"
                                            data-id="{{$patient->id}}"
                                            data-identityType_number="{{$patient->identity}}"
                                            data-identity_type_id="{{$patient->identity_type_id}}"
                                            data-requesting_authority="{{$patient->requesting_authority}}"
                                            data-request_number="{{$patient->request_number}}"
                                            data-action="edit"
                                        href="javascript:void(0);">
                                 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABA0lEQVRIS9WV4RGCMAyFExfQDdQJZAScQMoEOplOQHUCGUE3wA2cwJh6lCtQaK9e9eAuf2jzviTtvSJE/jCyPrQAUsqUfxw5ViFgAqg4DkKIUue3AOeiqBBxGSKucxQkE2JtBVyk5HWAnRBBo7Plt4T+DnAV8HUH0wToqodulnkhgkYUHWBWPs0z+GkHLgsJOmSXqKvDrtk92ezmXVE2qBvHll3yqdbYdReceOVIenuJHlmeN27ct2uik81RNUQJjokT4n7Qrm3jUNXOiEpA3ChIDUiA6P5CTHVXQ6P0smUT8hHyFK+L8TvGBsLbfSq3PjgulIKoPa6xmDpeI3KBx9ajA97iedIZzZfm6AAAAABJRU5ErkJggg=="/>
                            </a>
                        </td>
                        <td>{{$patient->birth_date}}</td>

                        <td>
                            <a class="edit" href="{{url('/request/'.$patient->id)}}">
                                {{$patient->name}}
                            </a>
                        </td>
                        <td>{{$patient->id}}</td>

                    </tr>
                @endforeach

            </tbody>
          </table>

        </div>
        <div class="table--footer">
            {{$patients->links('pagination.semantic-ui')}}
        </div>
      </div>

    <div class="row gy-3">
          <div class="col-lg-4 col-md-6">
            <div class="mt-3">
              <!-- Button trigger modal -->


              <!-- Modal -->
              <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <form action="{{url('')}}" id="formCreateRequest" method="post">
                    @csrf
                    <input id="method" type="hidden" name="_method" value="PUT">

                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">إصدار شهادة صحية</h5>
                        {{-- <button type="submit" class="btn btn-primary">حفظ </button> --}}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                        </div>

                        <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mt-4">
                                @foreach ($tests as $test)
                                    <div class="form-check form-switch mb-4">
                                        <input class="form-check-input" type="checkbox"name="tests[]" value="{{$test->id}}" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">{{$test->name_en}} | {{$test->name_ar}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-6">

                                <div class="col-12 mb-3">
                                    <label for="nameWithTitle" class="form-label-lg"> <strong>  رقم الاصال </strong></label>
                                    <input type="number" required  name='request_number' id="request_number" class="form-control" placeholder=" رقم الاصال"/>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nameWithTitle" class="form-label-lg"><strong>الجيهة</strong></label>
                                    <input type="text" required  name='requesting_authority' id="requesting_authority" class="form-control" placeholder="الجيهةالطالبة لي الشهادة"/>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nameWithTitle" class="form-label-lg"><strong>نوع الهوية</strong></label>
                                    {{-- <input type="text"name="positive" id="requesting_authority" class="form-control" placeholder="عندما تكون نتيجة التحليل موجبة"/> --}}
                                    <select name="identity_type_id" required  id="identity_type_id" class="form-select">
                                        @foreach ($identityTypes as $identityType)
                                        <option value="{{$identityType->id}}">{{$identityType->name}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nameWithTitle" class="form-label-lg"><strong>رقم الهوية</strong></label>
                                    <input type="text" required  id="identityType_number" name='identityType_number' class="form-control" placeholder="رقم الهوية"/>
                                </div>
                            </div>

                        </div>

                        </div>

                        <div class="modal-footer ">

                        <button type="button" class="btn btn-success" id="newRequest">انشاء جديد</button>

                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            الغاء
                        </button>
                        <button type="submit" class="btn btn-primary">حفظ </button>
                        </div>
                    </div>
                    </div>
                </form>
              </div>
            </div>
          </div>

    </div>
    <!--/ Bootstrap modals -->
@endsection
@section('script')
<script>
    var modal = document.getElementById('createModal');

    $(document).on("click", "#createModalOpen", function () {
        let id=$(this).data('id');
        let action= window.location.href.split('patient')[0];
        let url=action+'request/'+id+'/update'
        console.log($(this).data().identity_type_id);
        document.getElementById('requesting_authority').value=$(this).data().requesting_authority;
        document.getElementById('request_number').value=$(this).data().request_number;
        document.getElementById('formCreateRequest').action=url;
        document.getElementById('identity_type_id').value=$(this).data().identity_type_id;
        document.getElementById('identityType_number').value=$(this).data().identitytype_number;
        // modal.style.display = 'block';
        document.getElementById('method').value='PUT';


    });
    $(document).on("click", "#newRequest", function () {
        let action= document.getElementById('formCreateRequest').action;
        let url=action.split('/update')[0];
        console.log(url);
        document.getElementById('method').value='POST';

        document.getElementById('formCreateRequest').action=url;
        document.getElementById('identity_type_id').value=1;
        document.getElementById('identityType_number').value="";

        document.getElementById('requesting_authority').value="";
        document.getElementById('request_number').value="";
        document.getElementById('formCreateRequest').action=url;
        // document.getElementById('identity').value="";


    });

</script>


@endsection
