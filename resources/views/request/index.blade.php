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
    <div class="card">
        {{-- <h5 class="card-header">Table Basic</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>تاريخ الاصدار</th>
                <th>رقم الإصال</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if (isset($request->request))
                    @foreach ($request->request()->orderBy('id', 'DESC')->get() as $key=> $patientRequest)
                    <tr>
                      <td>{{$key }}</td>
                      <td>{{$patientRequest->created_at->format('h:m:s / Y-m-d ') }}</td>
                      <td>{{$patientRequest->request_number }}</td>
          
                        <td>
                            <a title="عرض نتيجة التحليل" data-bs-toggle="modal"data-bs-target="#modalCenter"id="createModalOpen" data-result="{{$patientRequest->results}}" href="#" >
                              <i data-feather='eye'></i>

                            </a>
                        </td>
                        <td>
                          <a title="طباعة التحليل" target="_blank"  href="{{url("/print/patient/$request->id/request/$patientRequest->id")}}" >
                            <i data-feather='printer'></i>
                          </a>
                      </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">لا يوجد سجل سابق</td>

                    </tr>
                @endif


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
                {{-- <form id="formNationality" action="{{url('/nationality')}}" method="post">
                    @csrf --}}
                    <input id="method" type="hidden" name="_method" value="PUT">

                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">نتيجة التحليل</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                        </div>
                        <div class="modal-body">
                            <table class="table-check-result table table-bordered" id="table-result">


                            </table>

                        </div>
                    </div>
                    </div>
                {{-- </form> --}}
              </div>
            </div>
          </div>

    </div>
    <!--/ Bootstrap modals -->
@endsection
@section('script')
<script>
    var tests = @json($tests,JSON_PRETTY_PRINT);
    var modal = document.getElementById('createModal');
    $(document).on("click", "#createModalOpen", function () {
        var result=$(this).data('result');
        var table= document.getElementById('table-result');
        table.innerHTML="";
        result.forEach(element => {
            var tr = document.createElement('tr');
            var test = document.createElement('td');
            test.appendChild(document.createTextNode(getTestName(element.test_id)))
            var value = document.createElement('td');
            value.appendChild(document.createTextNode(element.value))
            tr.appendChild(test)
            tr.appendChild(test)
            tr.appendChild(value)
            table.appendChild(tr)
        });
        // modal.style.display = 'block';


    });
    function getTestName(test_id) {
        var value;
        tests.forEach(element => {
            // console.log(element.name_en,element.id==test_id);
            if (element.id==test_id) {
                value=element.name_en;
            }
        });
        return value;
    }


</script>

@endsection
