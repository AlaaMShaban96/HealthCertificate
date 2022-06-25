@extends('new.layout.app',['title' => "التحاليل",'subtitle'=>'قائمة التحاليل'])



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
      اضافة تحليل
      </button>
    </div>
    {{-- <div class="col-10">
      <h4 class="fw-bold py-3 mb-4"> التحاليل<span class="text-muted fw-light">/قائمة التحاليل</span></h4>

    </div> --}}

    </div>

    <!-- Bootstrap modals -->
    <div class="card">
        {{-- <h5 class="card-header">Table Basic</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Actions</th>
                <th>عرض التحاليل</th>
                <th>تحليل منفرد</th>
                <th>الاسم عربي</th>
                <th>الاسم انجليزي</th>

              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($tests as $test)
                <tr>
                        <td>
                            <form action="{{url('/test/'.$test->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" id="createModalOpen"
                                        data-bs-toggle="modal" data-bs-target="#modalCenter"
                                        data-name_ar="{{$test->name_ar}}"
                                        data-name_en="{{$test->name_en}}"
                                        data-positive="{{$test->positive}}"
                                        data-negative="{{$test->negative}}"
                                        data-id="{{$test->id}}"
                                        data-action="edit"

                                       href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>تعديل</a>

                                    <button  class="dropdown-item delete" type="submit"><i class="bx bx-trash me-1"></i> حدف</button>
                                </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            {{-- <div class="form-check"> --}}
                                <input class="form-check-input" type="checkbox" id="selected{{$test->id}}" data-id="{{$test->id}}" name="selected" value="{{$test->selected}}" {{$test->selected?'checked':''}}>
                                {{-- </div> --}}
                        </td>
                        <td>
                            {{-- <div class="form-check"> --}}
                                <input class="form-check-input" data-id="{{$test->id}}" type="radio" id="unique" name="unique" {{$test->unique?'checked':''}} value="1">
                            {{-- </div> --}}
                        </td>
                        <td>{{$test->name_ar}}</td>
                        <td>{{$test->name_en}}</td>
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
    console.log();
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
