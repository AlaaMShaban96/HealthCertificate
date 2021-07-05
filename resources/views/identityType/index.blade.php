@extends('layout.app')

@section('style')


@section('content')
<div class="nav">
    <div><h2>المستندات</h2></div>

    <a id="createModalOpen" data-action="create" href="#" class="button">اضافة مستند</a>
</div>
<table>
    <thead>
        <td>الاسم</td>
        <td></td>
    </thead>
    <tbody>
    @foreach ($identityTypes as $identityType)
        <tr>
            <td>{{$identityType->name}}</td>
            <td>
                <form action="{{url('/identityType/'.$identityType->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                    <a class="edit" id="createModalOpen" data-name="{{$identityType->name}}" data-id="{{$identityType->id}}" data-action="edit" href="#"><i class="fa fa-pencil "></i></a>

                </form>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
<div class="table--footer">
    {{$identityTypes->links('pagination.semantic-ui')}}
</div>

<div id="createModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>اضافة مستند</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
                <form id="formIdentityType" action="{{url('')}}" method="POST">
                @csrf
                <input id="method" type="hidden" name="_method" value="PUT">
               
                    <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم المستند">
                        <label for="nameField">اسم المستند</label>
                    </div>
                </div>
                <button type="submit" id="button" class="button button-wide modal-footer">اضافة</button>
            </form>
        </div>
    </div>

</div>
@endsection
@section('script')
<script>
    var modal = document.getElementById('createModal');
    $(document).on("click", "#createModalOpen", function () {
        var action= document.getElementById('formIdentityType').action;
        let url = action.split('identityType');
        document.getElementById('formIdentityType').action=url[0];

        switch ($(this).data('action')) {
            case 'edit':
                document.getElementById('formIdentityType').action=action+'identityType/'+$(this).data('id');
                document.getElementById('nameField').value=$(this).data('name');
                document.getElementById('method').value='PUT';
                document.getElementById('button').style.backgroundColor="#159EC8";

                break;
            case 'create':
                document.getElementById('method').value='';
                document.getElementById('button').style.backgroundColor="#16D090";

                break;
        
            default:
                break;
        }

        modal.style.display = 'block';


    });

   
</script>

@endsection