@extends('layout.app')

@section('style')


@section('content')
<div class="nav">
    <div><h2>الجنسيات</h2></div>

    <a id="createModalOpen" data-action="create" href="#" class="button">اضافة جنسية</a>
</div>
<table>
    <thead>
        <td>الاسم</td>
        <td></td>
    </thead>
    <tbody>
    @foreach ($nationalities as $nationality)
        <tr>
            <td>{{$nationality->name}}</td>
            <td>
                <form action="{{url('/nationality/'.$nationality->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                    <a class="edit" id="createModalOpen" data-name="{{$nationality->name}}" data-id="{{$nationality->id}}" data-action="edit" href="#"><i class="fa fa-pencil "></i></a>

                </form>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
<div class="table--footer">
    {{$nationalities->links('pagination.semantic-ui')}}
</div>

<div id="createModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>اضافة جنسية</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
                <form id="formNationality" action="{{url('/nationality')}}" method="post">
                @csrf
                <input id="method" type="hidden" name="_method" value="PUT">

                    <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم الجنسية">
                        <label for="nameField">اسم الجنسة</label>
                    </div>
                </div>
                <button id="button" type="submit" class="button button-wide modal-footer">اضافة</button>
            </form>
        </div>
    </div>

</div>
@endsection
@section('script')
<script>
    var modal = document.getElementById('createModal');
    $(document).on("click", "#createModalOpen", function () {
        console.log($(this).data());
        var action= document.getElementById('formNationality').action;
        let url = action.split('nationality');
        document.getElementById('formNationality').action=url[0]+'nationality/';
        document.getElementById('method').value='';


        switch ($(this).data('action')) {
            case 'edit':
                document.getElementById('formNationality').action=action+'/'+$(this).data('id');
                document.getElementById('nameField').value=$(this).data('name');
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
</script>
@endsection