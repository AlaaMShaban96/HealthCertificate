{{-- @props(['nationalitys','tests','identityTypes']) --}}
<form action="{{url('/patient')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
        {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">الشهادة الصحية/</span> اصدار</h4> --}}
        <!-- Basic Layout -->
        <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
            <div class="card-header  justify-content-between align-items-center">
                <h5 class="mb-0">بيانات الشهادة الصحة</h5>
                <small class="text-muted float-end">يرجآ التأكد من ادخال جميع الحقول</small>
            </div>
            <div class="card-body row">
                <div class="mb-3 col-md-12">
                    <label class="form-label-lg" for="basic-default-fullname">الاسم</label>
                    <input required tabindex='1' name='name' type="text" class="form-control" id="basic-default-fullname" placeholder="الاسم التلاتي">
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label-lg" for="basic-default-company">رقم اﻹصال</label>
                    <input tabindex='1' name='request_number' type="number" class="form-control" id="basic-default-company" placeholder="رقم اﻹصال">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label-lg" for="basic-default-fullname">تاريخ الميلاد</label>
                        <input required tabindex='3' name='birth_date'   class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label-lg">الجنسية</label>
                    <select required name="nationality_id"   class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        @foreach ($nationalitys as $nationality)
                        <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label-lg" for="basic-default-company">الجيهة الطالبة للشهادة</label>
                    <input required tabindex='4' name='requesting_authority' type="text" class="form-control" id="basic-default-company" placeholder="الجيهة الطالبة للشهادة">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label-lg">الجنس</label>
                    <select required  name="gender" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option value="ذكر">ذكر</option>
                        <option value="انثي">انثي</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label-lg" for="basic-default-company">رقم الهوية</label>
                    <input required tabindex='5' name="identityType_number"  type="text" class="form-control" id="basic-default-company" placeholder="رقم اﻹصال">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label-lg">توع الهوية</label>
                    <select required  name=' identity_type_id'class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        @foreach ($identityTypes as $identityType)
                        <option value="{{$identityType->id}}">{{$identityType->name}}</option>
                        @endforeach
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
                            <img src="{{asset('images/avartar.png')}}" alt="">

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
                            {{-- <div class="mb-3" style="visibility: hidden;">
                                <label class="form-label-lg" for="basic-default-fullname">الصورة</label> --}}
                                <input  style="visibility: hidden;" type="text" name="photo" id="photo" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                            {{-- </div> --}}
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <h5 class="card-header">تحاليل</h5>
                <div class="card-body">
                    @foreach ($tests as $test)
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox"name="tests[]" value="{{$test->id}}" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">{{$test->name_en}} | {{$test->name_ar}}</label>
                    </div>
                    @endforeach


                </div>
              </div>
            </div>
        </div>

</form>