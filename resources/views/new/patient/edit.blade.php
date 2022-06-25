@extends('new.layout.app',['title' => "الملف الشخصي",'subtitle'=>'تعديل'])
@section('style')
<style>
  .input-style{
    margin-left: 5%;
    margin-top: 3%;

  }
  /* #my_camera{
        width: 320px;
        height: 240px;
        /* border: 1px solid black; */
    } */
  #results { padding:20px; border:1px solid; background:#ccc; }
  </style>
@endsection
@section('contenter')
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
{{-- <button type="button" class="btn btn-danger">Danger</button> --}}
<form action="{{url("/patient/$patient->id")}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">الشهادة الصحية/</span> اصدار</h4> --}}
        <!-- Basic Layout -->
        <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">بيانات الشهادة الصحة</h5>
                <small class="text-muted float-end">يرجآ التأكد من ادخال جميع الحقول</small>
            </div>
            <div class="card-body row">
                <div class="mb-3 col-md-12">
                    <label class="form-label" for="basic-default-fullname">الاسم</label>
                    <input required tabindex='1' name='name' type="text" class="form-control" value="{{$patient->name}}" id="basic-default-fullname" placeholder="الاسم التلاتي">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-fullname">تاريخ الميلاد</label>
                        <input required tabindex='3' name='birth_date'   class="form-control" type="date" value="{{$patient->birth_date}}"  id="html5-date-input">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">الجنسية</label>
                    <select required name="nationality_id"   class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        @foreach ($nationalitys as $nationality)
                        <option {{$patient->nationality_id== $nationality->id?'selected':''}} value="{{$nationality->id}}">{{$nationality->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">الجنس</label>
                    <select required  name="gender" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option {{$patient->gender== 'ذكر'?'selected':''}} value="ذكر">ذكر</option>
                        <option {{$patient->gender== 'انثي'?'selected':''}} value="انثي">انثي</option>
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">التقاط صورة</h5>
                    <small class="text-muted float-end">الكاميرة</small>
                </div>
                <div class="card-body">
                    <form>
                    <div class="mb-3">

                        <div class="avartar">
                            <div id='my_camera' >
                            <img id="image" style="width: 100%;" src="{{$patient->photo!=null?$patient->photo:asset('images/avartar.png')}}" alt="">

                            </div>

                            <div class="avartar-picker">
                            {{-- <input type="file" name="file-1" id="file-1" class="inputfile form-control" > --}}
                            {{-- <input type="text" name="photo" id="photo" class="inputfile" > --}}
                            <label id="zmdi-camera" for="file-1" style="display:none;" >
                                <i  class="zmdi zmdi-camera"></i>
                                <span>تحميل صورة</span>
                            </label>
                            <br>
                            <br>

                            <button id="take_snapshot" type="button"onClick="take_snap()" class="btn btn-success" style="display: none;">التقاط</button>
                            <button id="closeCamera" type="button"onClick="close_Camera()" class="btn btn-danger" style="visibility: hidden;">الغاء</button>
                            <button id="open_camera" type="button"onClick="openCamera()"class="btn btn-primary" >فتح الكاميرا</button>

                            </div>
                            <br>
                            <div class="mb-3" >
                                <a href="javascript:void(0);" id="clear">
                                    <i class='bx bx-refresh' style='color:#fb0000'  ></i>

                                </a>
                                <label class="form-label" for="basic-default-fullname">الصورة</label>
                                <input type="file" name="image" id="file-1" class="inputfile form-control" >
                            </div>
                            {{-- <div class="mb-3" style="visibility: hidden;">
                                <label class="form-label" for="basic-default-fullname">الصورة</label> --}}
                                <input  style="visibility: hidden;" type="text" name="photo" id="photo" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                            {{-- </div> --}}
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

</form>
@endsection
@section('script')
<script src="{{ asset('new/assets/js/webcam.js')}}"></script>
<script src="{{ asset('new/assets/js/take_snapshot.js')}}"></script>
<script>

$('input[type=file]').on('change',function(e){
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#image').attr('src', e.target.result);
    };
    reader.readAsDataURL(file);
});
// when click button clear input file value
$('#clear').click(function(){
    $('#file-1').val('');
    $('#image').attr('src', '{{asset('images/avartar.png')}}');
});

</script>

@endsection
