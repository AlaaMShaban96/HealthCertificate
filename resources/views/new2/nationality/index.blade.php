@extends('new2.layout.app',['title' => "الجنسيات",'subtitle'=>'قائمة الجنسيات'])



@section('contenter')

<section class="app-user-list">
 
  <!-- list and filter start -->
  <div class="card">
      <div class="card-body border-bottom">
          <h4 class="card-title"> عرض الجنسيات</h4>
          <div class="row">
              <div class="col-md-4 user_role"></div>
              <div class="col-md-4 user_plan"></div>
              <div class="col-md-4 user_status"></div>
          </div>
      </div>
      <div class="card-datatable table-responsive pt-0">
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="d-flex justify-content-between align-items-center header-actions mx-2 row mt-75">
              <div class="col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                <div class="dataTables_length" id="DataTables_Table_0_length">
                   
                </div>
              </div>
                <div class="col-sm-12 col-lg-8 ps-xl-75 ps-0">
                  <div class="dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap">
                    <div class="me-1">
                       
                    </div>
                    <div class="dt-buttons d-inline-flex mt-50 mb-2">
                      <button class="dt-button add-new btn btn-primary"
                          tabindex="0"
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                          id="createModalOpen" data-action="create"
                          >
                        <span>اضافة جنسية</span>
                      </button> 
                    </div>
                </div>
              </div>
                </div>
                <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                  <thead class="table-light">
                      <tr role="row">
                        <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 138.017px;" aria-label="">رقم</th>
                        <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 138.017px;" aria-sort="descending" aria-label="Name: activate to sort column ascending">الجنسية</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 138.017px;" aria-label="Actions">العمالية</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($nationalities as $key => $nationality)
                      <tr class="odd">
                        <td>{{ $key }}</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$nationality->name}}</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-flat-info dropdown-toggle waves-effect" type="button" id="dropdownMenuButton300" data-bs-toggle="dropdown" aria-expanded="false">
                              <i data-feather='grid'></i>
                            </button>
                            {{-- <form action="{{url('/nationality/'.$nationality->id)}}" method="post">
                              @csrf
                              @method('DELETE') --}}
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton300">
                                    <a class="dropdown-item" id="createModalOpen" data-action="edit" data-bs-toggle="modal" data-bs-target="#modalCenter" data-name="{{$nationality->name}}" data-id="{{$nationality->id}}" href="javascript:void(0);"><i data-feather='edit-3'></i> تعديل</a>
                                    <a class="dropdown-item delete" data-id="{{$nationality->id}}" href="#"><i data-feather='delete'></i> حدف</a>
                                </div>
                            {{-- </form> --}}
                          </div>
                              <form id="deleteForm{{ $nationality->id }}" action="{{url('/nationality/'.$nationality->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                              
                              </form>
                          </td>

                        </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $nationalities->links('pagination.bootstrap-4') }}

              </div>
            </div>
     
  </div>
  <!-- list and filter end -->
</section>

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
