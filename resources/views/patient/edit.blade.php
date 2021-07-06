@extends('layout.app')

@section('style')
<style>
  .input-style{
    margin-left: 5%;
    margin-top: 3%;
    
  }
  #my_camera{
 width: 320px;
 height: 240px;
 /* border: 1px solid black; */
}
  #results { padding:20px; border:1px solid; background:#ccc; }
  </style>
@endsection

@section('content')


<div class="nav">
  <div><h2>تعديل  الشهادة صحية</h2></div>

    <a  href="{{url('/patient')}}" class="button button-red">رجوع <i class="fa fa-chevron-circle-left fa-1x" aria-hidden="true"></i></a>

</div>

    <form action="{{url("/patient/$patient->id")}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div id="wizard">
          <section>

             <div class="form-header">
              <div class="avartar">
                <i  id="closeCamera" class="fa fa-times-circle fa-2x" aria-hidden="true" style="margin-left: 9%;visibility: hidden;"  onClick="closeCamera()"></i>
                <div id='my_camera' >
                  <img src="{{$patient->photo!=null?$patient->photo:'images/avartar.png'}}" alt="">

                </div>
                <div class="avartar-picker">
                  <input type="file" name="file-1" id="file-1" class="inputfile" >
                  <input type="text" name="photo" id="photo" value="{{$patient->photo}}" class="inputfile" >
                  <label id="zmdi-camera" for="file-1" style="display:none;" >
                    <i  class="zmdi zmdi-camera"></i>
                    <span>تحميل صورة</span>
                  </label>
                  <button id="take_snapshot" type="button"onClick="take_snap()" style="width: 33%;height: 38px;border-radius: 22px;background-color: #67a5f5;border: 0;color: white;margin-left: 4%;display: none;"> التقاط</button>
                  <button id="open_camera" type="button"onClick="openCamera()"style="width: 33%;height: 38px;border-radius: 22px;background-color: #67a5f5;border: 0;color: white;margin-left: 4%;display: inline;"> الكاميرة</button>

                </div>
                <br>
              </div>
                  <div class="form-group ">
                  <div class='input-style'>
                    <label>الاسم<label>
                    <input tabindex='1' name='name' type="text" placeholder="الاسم" class="form-control" value="{{$patient->name}}">
                  </div>
                      <div style="display: flex;" >
                          <div style="width: 50%;">
                            
                            <div class='input-style'>
                              <label>تاريخ الميلاد<label>
                              <input tabindex='3' name='birth_date' type="date" placeholder="تاريخ الميلاد" class="form-control" value="{{$patient->birth_date}}">
                            </div>
                            <div class='input-style'>
                              <label>الجنس<label>
                                <select  name="gender" id="" class="form-control" >
                                  <option {{$patient->gender== 'ذكر'?'selected':''}} value="ذكر">ذكر</option>
                                  <option {{$patient->gender== 'انثي'?'selected':''}}  value="انثي">انثي</option>
                                </select>
                            </div>
                          </div>
                          <div style="width: 50%;">
                            
                            <div class='input-style'>
                              <label>الجنسية<label>
                                <select name="nationality_id" id="" class="form-control">
                                  @foreach ($nationalitys as $nationality)
                                  <option {{$patient->nationality_id== $nationality->id?'selected':''}} value="{{$nationality->id}}">{{$nationality->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                              {{-- <div class='input-style'>
                                <label>الجيهة<label>
                                <input tabindex='4' name='requesting_authority' type="text" placeholder="الجيهة الطالبة لي الشهادة" class="form-control"value="{{$patient->requesting_authority}}">
                              </div> --}}

                          </div>
                        
                      </div>
                      
                      <div style="display: flex;" >
                          <div style="width: 50%;">
                            
                            {{-- <div class='input-style'>
                              <label>نوع الهوية<label>
                                <select name="identity_type_id" id="" class="form-control">
                                  @foreach ($identityTypes as $identityType)
                                  <option  {{$patient->identityTypes()->first()->pivot->identity_type_id == $identityType->id ?'selected':''}} value="{{$identityType->id}}">{{$identityType->name}}</option>
                                  @endforeach
                                </select>
                            </div> --}}
                     

                          </div>
                          {{-- <div style="width: 50%;">
                            <div class='input-style'>
                              <label>رقم الهوية<label>
                              <input tabindex='5' name='identityType_number' type="text" placeholder="رقم الهوية" class="form-control" value="{{$patient->identityTypes()->first()->pivot->identity}}">
                            </div>
                            
                              

                          </div> --}}
                        
                      </div>
                      <button type="submit"style="width: 33%;height: 38px;border-radius: 22px;background-color: #67a5f5;border: 0;color: white;margin-left: 4%;"> حفظ</button>

                      
             </div>
             
          </section>
           
      </div>
    </form>



@endsection
@section('script')
<script src="{{ asset('js/webcam.js')}}"></script>
<script src="{{ asset('js/take_snapshot.js')}}"></script>

@endsection