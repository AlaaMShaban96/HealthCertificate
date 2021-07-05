@extends('layout.app')

@section('style')


@section('content')
<div class="nav">
    <div><h2>التحاليل</h2></div>

    <a id="createModalOpen" data-action="create" href="#" class="button">اضافة تحليل</a>
</div>
<table>
    <thead>
        <td>الاسم عربي</td>
        <td>الاسم انجليزي</td>
        <td>تحليل منفرد</td>
        <td></td>
    </thead>
    <tbody>
    @foreach ($tests as $test)
        <tr>
            <td>{{$test->name_ar}}</td>
            <td>{{$test->name_en}}</td>
            <td><input data-id="{{$test->id}}" type="radio"  id="unique" name="unique" {{$test->unique?'checked':''}} value="1"></td>
            <td>
                <form action="{{url('/test/'.$test->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                    <a class="edit" id="createModalOpen" data-name_ar="{{$test->name_ar}}" data-name_en="{{$test->name_en}}" data-id="{{$test->id}}" data-action="edit" href="#"><i class="fa fa-pencil "></i></a>
                    <input type="checkbox" class="selected" id="selected{{$test->id}}" data-id="{{$test->id}}" name="selected" value="{{$test->selected}}" {{$test->selected?'checked':''}}>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
<div class="table--footer">
    {{$tests->links('pagination.semantic-ui')}}
</div>

<div id="createModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>اضافة تحليل</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
                <form id="formTest" action="{{url('/test')}}" method="post">
                @csrf
                <input id="method" type="hidden" name="_method" value="">
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name_ar" class="form-input" id="nameField" placeholder="اسم العربي">
                        <label for="nameField">اسم العربي</label>
                    </div>
                </div>
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name_en" class="form-input" id="nameField_en" placeholder="اسم الانجليزي">
                        <label for="nameField">اسم الانجليزي</label>
                    </div>
                </div>
              {{--    <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="positive" class="form-input" id="nameField" placeholder="النتيجة موجبة">
                        <label for="nameField">النتيجة موجبة</label>
                    </div>
                </div>
               <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="negative" class="form-input" id="nameField" placeholder="النتيجة سالبة">
                        <label for="nameField">النتيجة سالبة</label>
                    </div>
                </div> --}}
                <button id="button" type="submit" class="button button-wide modal-footer">اضافة</button>
            </form>
        </div>
    </div>

</div>
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
                document.getElementById('method').value='PUT';
                document.getElementById('button').style.backgroundColor="#159EC8";

                break;
            case 'create':
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