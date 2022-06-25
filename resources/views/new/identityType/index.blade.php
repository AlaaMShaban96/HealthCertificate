@extends('new.layout.app',['title' => "المستندات",'subtitle'=>'قائمة المستندات'])



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
      اضافة مستند
      </button>
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
                <th>مستند</th>

              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($identityTypes as $identityType)
                <tr>
                        <td>
                            <form action="{{url('/identityType/'.$identityType->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" id="createModalOpen" data-action="edit" data-bs-toggle="modal" data-bs-target="#modalCenter" data-name="{{$identityType->name}}" data-id="{{$identityType->id}}" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> تعديل</a>
                                    <button  class="dropdown-item delete" type="submit"><i class="bx bx-trash me-1"></i> حدف</button>
                                </div>
                                </div>
                            </form>
                        </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$identityType->name}}</td>

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
                <form id="formIdentityType" action="{{url('/identityType')}}" method="post">
                    @csrf
                    <input id="method" type="hidden" name="_method" value="PUT">

                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">المستندات</h5>
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
                                placeholder="المستند"
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
        var action= document.getElementById('formIdentityType').action;
        let url = window.location.href.split('#')[0];
        document.getElementById('formIdentityType').action=url;

        switch ($(this).data('action')) {
            case 'edit':
                document.getElementById('formIdentityType').action=url+'/'+$(this).data('id');
                document.getElementById('nameField').value=$(this).data('name');
                document.getElementById('method').value='PUT';
                document.getElementById('button').style.backgroundColor="#159EC8";

                break;
            case 'create':
                document.getElementById('method').value='';
                document.getElementById('nameField').value="";
                document.getElementById('button').style.backgroundColor="#16D090";

                break;

            default:
                break;
        }

        modal.style.display = 'block';


    });


</script>

@endsection
