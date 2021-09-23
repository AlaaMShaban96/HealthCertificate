@extends('layout.app')

@section('style')


@section('content')
<div class="nav">
    <div><h2>حدف الحالات </h2>

        <form action="{{url('remove')}}" method="POST">
            @method('DELETE')
            @csrf
            <label for="start">من:</label>
            <input type="date"  class="search"  id="start" placeholder="dd-mm-yyyy"     name="date[start]" >
            <label for="start">الي:</label>
            <input type="date"  class="search"  id="end" placeholder="dd-mm-yyyy"    name="date[end]" >
            <button  type="submit"  class="button button-red">حدف البيانات <i class="fa fa-trash"></i></button>
        </form>
     
    </div>

    {{-- <div> --}}
      
    {{-- </div> --}}
  
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
            <td>{{$patient->name}}</td>
            <td>{{$patient->birth_date}}</td>
        </tr>
    @endforeach
    </tbody>

</table>
<div class="table--footer">
    {{$patients->links('pagination.semantic-ui')}}
    {{-- {{$nationalities->links('pagination.semantic-ui')}} --}}

</div>



</div>
@endsection
