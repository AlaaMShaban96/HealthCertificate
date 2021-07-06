@extends('layout.app')

@section('style')


@section('content')
<div class="nav">
    <div><h2>سجل الشهدات الصادره  </h2></div>
    <a  href="{{url('/patient')}}" class="button button-red">رجوع <i class="fa fa-chevron-circle-left fa-1x" aria-hidden="true"></i></a>

</div>
<table>
    <thead>
        <td>#</td>
        <td>تاريخ الاصدار</td>
        <td>رقم الإصال</td>
        <td></td>
        <td></td>
       
    </thead>
    <tbody>
        @if (isset($request->request))
        @foreach ($request->request()->orderBy('id', 'DESC')->get() as $key=> $patientRequest)
            <tr>
                <td>{{$key }}</td>
                <td>{{$patientRequest->created_at->format('h:m / Y-m-d ') }}</td>
                <td>{{$patientRequest->request_number }}</td>
                <td>
                    <a id="createModalOpen"  data-result="{{$patientRequest->results}}" href="#" >عرض نتيجة</a>
                </td>
                <td>
                    <a target="_blank"  href="{{url("/print/patient/$request->id/request/$patientRequest->id")}}" >طباعة</a>
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

<div id="createModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>عرض النتيجة</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <table class="table-check-result" id="table-result">
                
                
              </table>
        </div>
    </div>

</div>


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
        modal.style.display = 'block';


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