
<table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead class="table-light">
        <tr role="row">
          <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 138.017px;" aria-sort="descending" aria-label="Name: activate to sort column ascending">الاسم</th>
          <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 138.017px;" aria-sort="descending" aria-label="Name: activate to sort column ascending">الصلاحية</th>
          <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 138.017px;" aria-sort="descending" aria-label="Name: activate to sort column ascending">الفرع</th>
          <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 138.017px;" aria-label="Actions">العمالية</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($users as $key => $user)
        <tr class="odd">
          <td>{{$user->name}}</td>
          <td> 
            @switch($user->role)
                @case("employe")
                    <span class="badge rounded-pill badge-glow bg-primary">موضف</span>  
                    @break
                @case("monitor")
                    <span class="badge rounded-pill badge-glow bg-warning">مراقب</span>  
                    @break
                @case("admin")
                    <span class="badge rounded-pill badge-glow bg-info">مدير  علي الفرع </span> 
                    @break
                @case("super-admin")
                    <span class="badge rounded-pill badge-glow bg-danger">مدير  علي النظام </span>
                    @break
                @default
                    
            @endswitch
          </td> 
          <td>{{$user->branch_id?$user->branch->name:'ادارة النظام'}}</td>
          <td>
            <div class="btn-group">
              <button class="btn btn-flat-info dropdown-toggle waves-effect" type="button" id="dropdownMenuButton300" data-bs-toggle="dropdown" aria-expanded="false">
                <i data-feather='grid'></i>
              </button>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton300">
                    <a class="dropdown-item " href="{{ route('users.profile',$user->id) }}"><i data-feather='mouse-pointer'></i> ملف المستخدم </a>

                      <a class="dropdown-item" id="createModalOpen" data-action="edit" data-bs-toggle="modal" data-bs-target="#modalCenter"
                       data-name="{{$user->name}}" 
                       data-role="{{$user->role}}" 
                       data-branch_id="{{$user->branch_id}}" 
                       data-phone="{{$user->phone}}"
                       data-email="{{$user->email}}"
                       data-id="{{$user->id}}"
                        href="javascript:void(0);"><i data-feather='edit-3'></i> تعديل</a>
                      <a class="dropdown-item delete" data-id="{{$user->id}}" href="#"><i data-feather='delete'></i> حدف</a>
                  </div>
            </div>
                <form id="deleteForm{{ $user->id }}" action="{{url('/users/'.$user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                
                </form>
            </td>

          </tr>
      @endforeach
    </tbody>
  </table>



  <div class="row gy-3">
    <div class="col-lg-4 col-md-6">
      <div class="mt-3">
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
          <form id="formIdentityType" action="{{url('/users')}}" method="post">
              @csrf
              <input id="method" type="hidden" name="_method" value="PUT">

              <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">المستخدم</h5>
                  <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                  ></button>
                  </div>
                  <div class="modal-body">
                  <div class="row">
                      <div class="col-xl-6 col-md-6 col-12">
                          <label for="nameWithTitle" class="form-label">الاسم</label>
                          <input
                              type="text"
                              name="name"
                              id="name"
                              class="form-control"
                              placeholder="اسم المستخدم "
                              required
                          />
                      </div>
                      <div class="col-md-6 mb-1" data-select2-id="148">
                          <label class="form-label" for="select2-basic">الفرع</label>
                          <div class="position-relative" data-select2-id="147">
                              <select class="select2 form-select select2-hidden-accessible" required name="branch_id" id="branch_id" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true">
                              <option value="" data-select2-id="2">مدير نظام</option>
                                  @foreach ($branches as $key => $name)
                                      <option value="{{ $key }}" data-select2-id="2">{{ $name }}</option>
                                  @endforeach
                              </select>

                          </div>
                      </div>
                      <div class="col-xl-6 col-md-6 col-12">
                          <div class="mb-1">
                              <label class="form-label" for="basicInput">رقم الهاتف</label>
                              <input type="number" class="form-control"  required name="phone" id="phone" placeholder="ادخال الرقم من دون 0 ">
                          </div>
                      </div>
                      <div class="col-xl-6 col-md-6 col-12">
                          <div class="mb-1">
                              <label class="form-label" for="basicInput">البريد الالكتروني</label>
                              <input type="email" class="form-control" required name="email" id="email" placeholder="البريدالالكتروني">
                          </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-12">
                          <div class="mb-1">
                              <label class="form-label" for="basicInput">كلمة المرور</label>
                              <input type="password" class="form-control" required name="password"  id="password" placeholder="كلمة السر ">
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="card">
                              <div class="card-header">
                                  <span class="card-title">الصلاحيات</span>
                              </div>
                              <div class="card-body">
                                  <div class="demo-inline-spacing">
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input"  type="radio" name="role" id="employe" value="employe" checked="">
                                          <label class="form-check-label" for="inlineRadio1">موضف</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="role" id="monitor" value="monitor">
                                          <label class="form-check-label" for="inlineRadio2">مراقب</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
                                          <label class="form-check-label" for="inlineRadio3">مدير علي الفرع</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="role" id="super-admin" value="super-admin">
                                          <label class="form-check-label" for="inlineRadio4">مدير علي النظام </label>
                                      </div>
                                      
                                  </div>
                              </div>
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
{{-- <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script> --}}

<script>
  var modal = document.getElementById('createModal');
  $(document).on("click", "#createModalOpen", function () {
      var action= document.getElementById('formIdentityType').action;
      let url = window.location.href.split('#')[0];
      document.getElementById('formIdentityType').action=url;

      switch ($(this).data('action')) {
          case 'edit':
              document.getElementById('name').value=$(this).data().name;
              document.getElementById($(this).data().role).checked=true;
              document.getElementById('branch_id').value=$(this).data().branch_id;
              document.getElementById('phone').value=$(this).data().phone;
              document.getElementById('email').value=$(this).data().email;

              document.getElementById('formIdentityType').action=url+'/'+$(this).data('id');
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