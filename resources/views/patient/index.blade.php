@extends('layout.app')

@section('style')


@section('content')
<div class="nav">
    <div><h2>الحالات</h2>
        <form action="{{url('patient')}}" method="GET">
            <input class="search" name="name" placeholder="البحث" />
        </form>
    </div>
  
    {{-- <a id="createModalOpen" href="#" class="button">اضافة جنسية</a> --}}
</div>
<table>
    <thead>
        <td>الرقم</td>
        <td>الاسم</td>
        <td>تاريخ الميلاد</td>
        <td></td>
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
                    <a class="edit" id="createModalOpen" data-id="{{$patient->id}}" href="#"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a>
                    <button class="delete" type="submit"><i class="fa fa-trash fa-2x"></i></button>

                </form>
            </td>
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
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
                <form action="{{url('')}}" id="formCreateRequest" method="post">
                @csrf
                <div style="display: flex;" >
                    <div style="width: 50%;padding-left: 10%;">
                        <div class='input-style'>
                            <label>الجيهة<label>
                            <input tabindex='4' name='requesting_authority' type="text" placeholder="الجيهة الطالبة لي الشهادة" class="form-control">
                        </div>
                        <div class='input-style'>
                            <label>نوع الهوية<label>
                            <select name="identityType_id" id="" class="form-control">
                                @foreach ($identityTypes as $identityType)
                                <option value="{{$identityType->id}}">{{$identityType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='input-style'>
                            <label>رقم الهوية<label>
                            <input tabindex='5' name='identityType_number' type="text" placeholder="رقم الهوية" class="form-control">
                        </div>
                        <br>
                        <br>
                        <div class='input-style'>
                            <button type="submit"style="width: 33%;height: 38px;border-radius: 22px;background-color: #67a5f5;border: 0;color: white;margin-left: 4%;"> طباعة</button>
                        </div>
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
        let action= document.getElementById('formCreateRequest').action;
        let url=action+'request/'+id
        document.getElementById('formCreateRequest').action=url;
        modal.style.display = 'block';

    });
   
</script>

@endsection