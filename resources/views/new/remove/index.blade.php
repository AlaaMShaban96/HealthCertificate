@extends('new.layout.app',['title' => "الحالات",'subtitle'=>'قائمة الحالات'])



@section('contenter')
  <div class="row">
    <div class="col-12">

      <div class="col-xxl mb-3 text-end">
        <div class="card ">
          {{-- <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Basic with Icons</h5>
          </div> --}}
          <form action="{{url('remove')}}" method="POST">
            @method('DELETE')
            @csrf
          <div class="card-body row">
              <div class="col-lg-6 mb-3">
                <label class="form-label-lg fw-bold" for="basic-icon-default-fullname ">الي تاريخ</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text "><i class='bx bxs-arrow-from-left'></i></span>
                  <input class="form-control" type="date" placeholder="dd-mm-yyyy"  value="{{request('date[end]')}}" name="date[end]" tabindex='4'   id="html5-date-input">
                </div>
              </div>
              <div class="col-lg-6 mb-3">
                <label class="form-label-lg fw-bold" for="basic-icon-default-fullname ">  من تاريخ</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text "><i class='bx bxs-arrow-from-right'></i></span>
                  <input required class="form-control" type="date" placeholder="dd-mm-yyyy"  value="{{request('date[start]')}}" name="date[start]" tabindex='3'  id="html5-date-input">
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">

                  <button type="submit" class="btn btn-danger btn-buy-now delete" title="حدف جميع السجلات"><i class='bx bxs-message-square-x bx-tada' ></i></button>
                </div>
              </div>
          </div>
        </form>

        </div>
      </div>
    </div>


    </div>

    <!-- Bootstrap modals -->
    <div class="card">
        {{-- <h5 class="card-header">Table Basic</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>تاريخ الميلاد</th>
                <th>الاسم</th>
                <th>الرقم</th>


              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($patients as $patient)
                <tr>
                        <td>{{$patient->birth_date}}</td>

                        <td>
                            <a class="edit" href="{{url('/request/'.$patient->id)}}">
                                {{$patient->name}}
                            </a>
                        </td>
                        <td>{{$patient->id}}</td>

                    </tr>
                @endforeach

            </tbody>
          </table>

        </div>
        <div class="table--footer">
            {{$patients->links('pagination.semantic-ui')}}
        </div>
      </div>

    <!--/ Bootstrap modals -->
@endsection

