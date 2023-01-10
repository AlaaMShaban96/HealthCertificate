@extends('layout.app',['title' => "المستندات",'subtitle'=>'قائمة المستندات'])



@section('contenter')



            <!-- users list start -->
            <section class="app-user-list"> 
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title"> عرض الفروع </h4>
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
                                      <span>اضافة فرع</span>
                                    </button> 
                                  </div>
                              </div>
                            </div>
                              </div>
                              <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead class="table-light">
                                    <tr role="row">
                                      <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 138.017px;" aria-sort="descending" aria-label="Name: activate to sort column ascending">الفرع</th>
                                      <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 138.017px;" aria-label="Actions">العمالية</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($branches as $key => $branche)
                                    <tr class="odd">
                                      <td>{{$branche->name}}</td>
                                      <td>
                                          <div class="btn-group">
                                            <button class="btn btn-flat-info dropdown-toggle waves-effect" type="button" id="dropdownMenuButton300" data-bs-toggle="dropdown" aria-expanded="false">
                                              <i data-feather='grid'></i>
                                            </button>
                    
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton300">
                                                    <a class="dropdown-item " href="{{ route('branches.profile',$branche->id) }}"><i data-feather='mouse-pointer'></i> ملف الفرع </a>
                                                    <a class="dropdown-item" id="createModalOpen" data-action="edit" data-bs-toggle="modal" data-bs-target="#modalCenter" data-name="{{$branche->name}}" data-id="{{$branche->id}}" href="javascript:void(0);"><i data-feather='edit-3'></i> تعديل</a>
                                                    <a class="dropdown-item delete" data-id="{{$branche->id}}" href="#"><i data-feather='delete'></i> حدف</a>
                                                </div>
                                          </div>
                                          <form id="deleteForm{{ $branche->id }}" action="{{url('/branches/'.$branche->id)}}" method="post">
                                              @csrf
                                              @method('DELETE')
                                          
                                          </form>
                                      </td>
                  
                                      </tr>
                                  @endforeach
                                </tbody>
                              </table>
                             {{ $branches->links('pagination.bootstrap-4') }}
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
            <form id="formIdentityType" action="{{url('/branches')}}" method="post">
                @csrf
                <input id="method" type="hidden" name="_method" value="PUT">

                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">الفرع</h5>
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
                            placeholder="اسم الفرع "
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
