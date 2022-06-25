@extends('new.layout.app',['title' => "الجنسيات",'subtitle'=>'قائمة الجنسيات'])



@section('contenter')
  <div class="row">
    <div class="col-2">
      <button
      type="button"
      class="btn btn-success mb-3"
      data-bs-toggle="modal"
      data-bs-target="#modalCenter"
      id="createModalOpen" data-action="create"
      >
      اضافة جنسية
      </button>
    </div>
    {{-- <div class="col-10">
      <h4 class="fw-bold py-3 mb-4"> الجنسيات<span class="text-muted fw-light">/قائمة الجنسيات</span></h4>

    </div> --}}

    </div>

    <!-- Bootstrap modals -->
    <div class="card">
        {{-- <h5 class="card-header">Table Basic</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table ">
            <thead>
              <tr>
                <th>Actions</th>
                <th>الجنسية</th>

              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($nationalities as $nationality)
                    <tr>
                        <td>
                            <form action="{{url('/nationality/'.$nationality->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" id="createModalOpen" data-action="edit" data-bs-toggle="modal" data-bs-target="#modalCenter" data-name="{{$nationality->name}}" data-id="{{$nationality->id}}" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> تعديل</a>
                                    <button  class="dropdown-item delete" type="submit"><i class="bx bx-trash me-1"></i> حدف</button>
                                </div>
                                </div>
                            </form>
                        </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$nationality->name}}</td>

                    </tr>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    <div class="row gy-3">
          <div class="col-lg-4 col-md-6">
            <div class="mt-3">
              <!-- Button trigger modal -->


              <!-- Modal -->
              <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <form id="formNationality" action="{{url('/nationality')}}" method="post">
                    @csrf
                    <input id="method" type="hidden" name="_method" value="PUT">

                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">الجنسيات</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                        </div>
                        <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">الاسم</label>
                            <input
                                type="text"
                                name="name"
                                id="nameField"
                                class="form-control"
                                placeholder="اسم الجنسية"
                            />
                            </div>
                        </div>

                        </div>
                        <div class="modal-footer">
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
        console.log($(this).data());
        var action= document.getElementById('formNationality').action;
        let url = window.location.href.split('#')[0]
        document.getElementById('formNationality').action=url;
        document.getElementById('method').value='';


        switch ($(this).data('action')) {
            case 'edit':
                document.getElementById('formNationality').action= url+'/'+$(this).data('id');
                document.getElementById('nameField').value=$(this).data('name');
                document.getElementById('method').value='PUT';
                // document.getElementById('button').style.backgroundColor="#159EC8";

                break;
            case 'create':
                document.getElementById('button').style.backgroundColor="#16D090";
                document.getElementById('nameField').value="";
                break;

            default:
                break;
        }
        // modal.style.display = 'block';
    });
</script>
@endsection
