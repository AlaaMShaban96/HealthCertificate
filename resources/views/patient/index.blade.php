@extends('layout.app')

@section('style')


@section('content')
<div class="nav">
    <div><h2>الحالات</h2>

        <form action="{{url('patient')}}" method="GET">
            <input class="search" name="name" placeholder="البحث" />

            <label for="start">من:</label>
            <input type="date"  class="search"  id="start" placeholder="dd-mm-yyyy"     name="date[start]" >
            <label for="start">الي:</label>
            <input type="date"  class="search"  id="end" placeholder="dd-mm-yyyy"    name="date[end]" >
            <button  type="submit"  class="button">بحث</button>

        </form>
    {{-- </div>
    <div> --}}

    </div>
  
</div>
<table>
    <thead>
        <td>الرقم</td>
        <td>الاسم</td>
        <td>تاريخ الميلاد</td>
        <td></td>
        {{-- <td></td> --}}
    </thead>
    <tbody>
    @foreach ($patients as $patient)
        <tr>
            <td>{{$patient->id}}</td>
            <td>
                <a class="edit" href="{{url('/request/'.$patient->id)}}">
                    {{$patient->name}}
                </a>
            </td>
            <td>{{$patient->birth_date}}</td>
            {{-- <td><img src="{{$patient->photo}}" alt=""style="width: 22%;"></td> --}}
            <td>
                <form action="{{url('/patient/'.$patient->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a class="edit" href="{{url('/patient/'.$patient->id)}}"><i class="fa fa-pencil fa-2x"></i></a>
                    <a class="edit" id="createModalOpen" 
                    data-id="{{$patient->id}}" 
                    data-identityType_number="{{$patient->identity}}" 
                    data-identity_type_id="{{$patient->identity_type_id}}" 
                    data-requesting_authority="{{$patient->request()->latest()->first()->requesting_authority}}" 
                    data-request_number="{{$patient->request()->latest()->first()->request_number}}" 
                    href="#"
                    
                    >
                    <i class="fa fa-floppy-o fa-2x" aria-hidden="true"></i>

                    {{-- <i class="fa fa-print fa-2x" aria-hidden="true"></i> --}}
                </a>
                    <button class="delete" type="submit"><i class="fa fa-trash fa-2x"></i></button>

                </form>
            </td>
            {{-- <td>
                <a class="edit" href="#">
                    <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>

                </a>
            </td> --}}
        </tr>
    @endforeach
    </tbody>

</table>
<div class="table--footer">
    {{$patients->links('pagination.semantic-ui')}}
    {{-- {{$nationalities->links('pagination.semantic-ui')}} --}}

</div>


<div id="createModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content-patient">
        <div class="modal-header">
            <h2>اصدار شهادة</h2>
            {{-- <button type="submit"style="width: 33%;height: 38px;border-radius: 22px;background-color: #67a5f5;border: 0;color: white;margin-left: 4%;"> طباعة</button> --}}
            
          
            {{-- <span ><i class="fa fa-file-text" aria-hidden="true"></i></span> --}}
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
                <form action="{{url('')}}" id="formCreateRequest" method="post">
                @csrf
                {{-- <input id="method" type="hidden" name="_method" value="PUT"> --}}

                <div style="display: flex;" >
                    <div style="width: 50%;padding-left: 10%;">
                        <div class='input-style'>
                            <label>رقم الاصال<label>
                            <input tabindex='4' name='request_number' id="request_number" type="text" placeholder="الجيهة الطالبة لي الشهادة" class="form-control">
                        </div>
                        <div class='input-style'>
                            <label>الجيهة<label>
                            <input tabindex='4' name='requesting_authority' id="requesting_authority" type="text" placeholder="الجيهة الطالبة لي الشهادة" class="form-control">
                        </div>
                        <div class='input-style'>
                            <label>نوع الهوية<label>
                            <select name="identity_type_id" id="identity_type_id" class="form-control">
                                @foreach ($identityTypes as $identityType)
                                <option value="{{$identityType->id}}">{{$identityType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='input-style'>
                            <label>رقم الهوية<label>
                            <input tabindex='5' id="identityType_number" name='identityType_number' type="text" placeholder="رقم الهوية" class="form-control">
                        </div>
                        <br>
                        <br>
                        <div class='input-style'>
                            <button type="submit"style="width: 33%;height: 38px;border-radius: 22px;background-color: #67a5f5;border: 0;color: white;margin-left: 4%;"> حفظ</button>
                        </div>
                        {{-- <div class='input-style'>
                            <button type="submit"style="width: 33%;height: 38px;border-radius: 22px;background-color: #67a5f5;border: 0;color: white;margin-left: 4%;"> حفظ</button>
                        </div> --}}
                    </div>
                    <div style="width: 50%;">
                        <table class="table-check">
                            @foreach ($tests as $test)
                            <tr>
                              <td>
                                 <label class="switch">
                                    <input id="checkboxinp" type="checkbox" name="tests[]" value="{{$test->id}}">
                                    <div class="slider round"></div>     
                                </label>
                              </td>
                              <td>
                                {{$test->name_en}}
                              </td>
                            
                            </tr>
                            @endforeach
                            
                          </table>
                         
                    </div>
                   
                </div>
                <div style="text-align: end;">
                    <a class="edit" href="#" id="newRequest">
                        جديد
                        <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
        
                    </a>
                </div>
                
            </form>
        </div>
    </div>

</div>
</div>
@endsection
@section('script')
<script>
    var tests = @json($tests,JSON_PRETTY_PRINT);
    var modal = document.getElementById('createModal');

    $(document).on("click", "#createModalOpen", function () {
        let id=$(this).data('id');
        let action= window.location.href.split('patient')[0];
        let url=action+'request/'+id+'/update'
        console.log($(this).data().identity_type_id);
        document.getElementById('requesting_authority').value=$(this).data().requesting_authority;
        document.getElementById('request_number').value=$(this).data().request_number;
        document.getElementById('formCreateRequest').action=url;
        document.getElementById('identity_type_id').value=$(this).data().identity_type_id;
        document.getElementById('identityType_number').value=$(this).data().identitytype_number;
        modal.style.display = 'block';

    });
    $(document).on("click", "#newRequest", function () { 
        let action= document.getElementById('formCreateRequest').action;
        let url=action.split('/update')[0];
        console.log(url);
        document.getElementById('formCreateRequest').action=url;
        document.getElementById('identity_type_id').value=1;
        document.getElementById('identityType_number').value="";

        document.getElementById('requesting_authority').value="";
        document.getElementById('request_number').value="";
        document.getElementById('formCreateRequest').action=url;
        // document.getElementById('identity').value="";


    });
  
    // <script >
            // function filldate(){
                // var d=Date.now() // date received from card
    // document.getElementById('cardexpirydate1').value=d.split('/').reverse().join("-");
    // document.getElementById('cardexpirydate2').value=d.split('/').reverse().join("-");


//     var d=new Date().toJSON().slice(0,10).replace(/-/g,'/');// date received from card
// console.log(d);
            // function filldate(){
    // document.getElementById('cardexpirydate1').value=d;
    // document.getElementById('cardexpirydate2').value=d;
    // }
        // </script>
</script>

@endsection