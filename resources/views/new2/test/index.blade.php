@extends('new2.layout.app',['title' => "التحاليل",'subtitle'=>'قائمة التحاليل'])



@section('contenter')







<!-- list and filter start -->
<div class="card">
  <div class="card-body border-bottom">
      <h4 class="card-title"> عرض التحاليل</h4>
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
                    <span>اضافة تحليل</span>
                  </button> 
                </div>
            </div>
          </div>
            </div>
            <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
              <thead class="table-light">
                  <tr role="row">
                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 138.017px;" aria-label="">رقم</th>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 138.017px;" aria-sort="descending" aria-label="Name: activate to sort column ascending">الاسم انجليزي</th>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 138.017px;" aria-sort="descending" aria-label="Name: activate to sort column  ascending">الاسم عربي</th>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 138.017px;" aria-sort="descending" aria-label="Name: activate to sort column  ascending">تحليل منفرد</th>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 138.017px;" aria-sort="descending" aria-label="Name: activate to sort column  ascending">عرض التحاليل</th>
                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 138.017px;" aria-label="Actions">العمالية</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($tests as $key => $test)
                  <tr class="odd">
                    <td>{{ $key }}</td>
                    <td>{{$test->name_ar}}</td>
                    <td>{{$test->name_en}}</td>
                    <td>
                      <input class="form-check-input" data-id="{{$test->id}}" type="radio" id="unique" name="unique" {{$test->unique?'checked':''}} value="1">
                    </td>
                    <td>
                      <input class="form-check-input selected" type="checkbox" id="selected{{$test->id}}" data-id="{{$test->id}}" name="selected" value="{{$test->selected}}" {{$test->selected?'checked':''}}>
                    </td>

                    <td>
                      <div class="btn-group">
                        <button class="btn btn-flat-info dropdown-toggle waves-effect" type="button" id="dropdownMenuButton300" data-bs-toggle="dropdown" aria-expanded="false">
                          <i data-feather='grid'></i>
                        </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton300">
                                <a class="dropdown-item"
                                id="createModalOpen"
                                data-bs-toggle="modal" data-bs-target="#modalCenter"
                                data-name_ar="{{$test->name_ar}}"
                                data-name_en="{{$test->name_en}}"
                                data-positive="{{$test->positive}}"
                                data-negative="{{$test->negative}}"
                                data-id="{{$test->id}}"
                                data-action="edit"

                                href="javascript:void(0);"
                                     ><i data-feather='edit-3'></i> تعديل</a>
                                <a class="dropdown-item delete" data-id="{{$test->id}}" href="#"><i data-feather='delete'></i> حدف</a>
                            </div>
                      </div>
                          <form id="deleteForm{{ $test->id }}" action="{{url('/test/'.$test->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                          
                          </form>
                      </td>

                    </tr>
                @endforeach
              </tbody>
            </table>
           {{ $tests->links('pagination.bootstrap-4') }}
          </div>
        </div>
 
</div>

<div class="row gy-3">
      <div class="col-lg-4 col-md-6">
        <div class="mt-3">
          <!-- Button trigger modal -->


          <!-- Modal -->
          <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <form id="formTest" action="{{url('/test')}}" method="post">
                @csrf
                <input id="method" type="hidden" name="_method" value="PUT">

                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">التحاليل</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="nameWithTitle" class="form-label"> الاسم العربي </label>
                            <input type="text"name="name_ar" id="nameField" class="form-control" placeholder="اسم التحليل باللغة العربية"/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameWithTitle" class="form-label">الاسم الانجليزي</label>
                            <input type="text"name="name_en" id="nameField_en" class="form-control" placeholder="اسم التحليل باللغة الانجليزية"/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameWithTitle" class="form-label">النتيجة الموجبة</label>
                            <input type="text"name="positive" id="positive" class="form-control" placeholder="عندما تكون نتيجة التحليل موجبة"/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameWithTitle" class="form-label">النتيجة السالبة</label>
                            <input type="text"name="negative" id="negative" class="form-control" placeholder="عندما تكون نتيجة التحليل سالبة"/>
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
        var action= document.getElementById('formTest').action;
        let url = window.location.href.split('#')[0];
        document.getElementById('formTest').action=url;
        document.getElementById('method').value='';


        switch ($(this).data('action')) {
            case 'edit':
                document.getElementById('formTest').action=url+'/'+$(this).data('id');
                document.getElementById('nameField').value=$(this).data('name_ar');
                document.getElementById('nameField_en').value=$(this).data('name_en');
                document.getElementById('positive').value=$(this).data('positive');
                document.getElementById('negative').value=$(this).data('negative');
                document.getElementById('method').value='PUT';
                document.getElementById('button').style.backgroundColor="#159EC8";

                break;
            case 'create':
            document.getElementById('nameField').value="";
                document.getElementById('nameField_en').value="";
                document.getElementById('positive').value="";
                document.getElementById('negative').value="";
                document.getElementById('button').style.backgroundColor="#16D090";
                break;

            default:
                break;
        }
        modal.style.display = 'block';
    });
    $(document).on("click", "#unique", function () {
        let id=$(this).data('id');

        let _token   = $('meta[name="csrf-token"]').attr('content');
        // console.log($(this).data(),selected);

      $.ajax({
        url:  window.location.href.split('#')[0]+'/'+id+"/unique",
        type:"POST",
        data:{
            unique:1,
          _token: _token
        },
        success:function(response){
          console.log(response);

        },
       });
    });
    $(document).on("click", ".selected", function () {
        let id=$(this).data('id');
        let selected= document.getElementById('selected'+id).checked
        let _token   = $('meta[name="csrf-token"]').attr('content');
        console.log($(this).data(),selected);

      $.ajax({
        url:  window.location.href.split('#')[0]+"/"+id+"/selected",
        type:"POST",
        data:{
          selected:selected,
          _token: _token
        },
        success:function(response){
          console.log(response);

        },
       });
    });
</script>
@endsection
