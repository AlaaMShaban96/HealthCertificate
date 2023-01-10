@extends('layout.app',['title' => "المستندات",'subtitle'=>'قائمة المستندات'])



@section('contenter')



            <!-- users list start -->
            <section class="app-user-list"> 
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title"> عرض المستخدمين </h4>
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
                                      <span>اضافة مستخدم</span>
                                    </button> 
                                  </div>
                              </div>
                            </div>
                              </div>
                              <x-shared.user.user-list :users="$users"></x-shared.user.user-list>
                              {{ $users->links('pagination.bootstrap-4') }}
                              {{-- <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
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
                             {{ $users->links('pagination.bootstrap-4') }} --}}
                            </div>
                          </div>
                   
                  </div>
                <!-- list and filter end -->
            </section>














    <!--/ Bootstrap modals -->
@endsection
@section('script')


@endsection
