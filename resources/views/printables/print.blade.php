<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Report</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">
    <style>
        @page {
            margin-top: 8cm;
            margin-bottom: 4cm;
            header: page-header;
        }

        .page-break {
            page-break-inside: avoid;
        }

        body {
            font-family: 'Jomolhari', sans-serif !important;
        }

        .font-weight-bold {
            font-weight: bold !important;
        }

        .mt {
            margin-top: 14px;
        }

        .my {
            margin-top: 14px;
            margin-bottom: 14px;
        }

        .py {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .auto-width {
            width: auto !important;
        }

        .half-half-width {
            width: 25%;
        }

        .half-width {
            width: 50%;
        }

        .full-width {
            width: 100%;
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 3px;
        }

        th {
            font-size: 12px;
        }

        td {
            font-size: 11px;
        }

        #col-title {
            text-align: center;
            font-weight: 500;
            background-color: #fcdede;
            border: 1px solid #fcdede;
        }

        .text-h6 {
            text-align: center;
            font-weight: 500;
        }

        .limited-width {
            max-width: 30px;
        }

        .col-border {
            border: 1px solid #fcdede;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-title {
            font-size: 20px;
            font-weight: bold;
        }

        .light-blue-bg {
            background-color: #f3f3fc !important;
        }

        .light-blue-border {
            border: 1px solid #f3f3fc !important;
        }

        .light-bg {
            background-color: #f8f8f8 !important;
        }

        .light-border {
            border: 1px solid #f8f8f8 !important;
        }

        .dark-border {
            border: 1px solid #E2E2E2 !important;
        }

        .dark-bg {
            background-color: #E2E2E2 !important;
        }

        .red-border {
            border: 1px solid #fcdede !important;
        }

        .red-bg {
            background-color: #fcdede !important;
        }

        .light-red-border {
            border: 1px solid #fff6f6 !important;
        }

        .light-red-bg {
            background-color: #fff6f6 !important;
        }

       

        .table-title {
            font-size: 20px !important;
            font-weight: bold;
            padding: 4px;
        }

        .test-name {
            font-size: 14px !important;
            font-weight: bold;
            padding: 4px;
            color: red;
        }

        .text-underline {
            text-decoration: underline;
        }

        .text-blue {
            color: blue !important;
        }

        .text-red {
            color: red !important;
        }
        .td{
            height:20px;
            text-align: center;
            font-family: 'Lateef',serif !important;
            padding: 0;
            font-size: 20px;

        }
        .td1{
            width: 30%; 
            background-color: rgb(248, 198, 190) ;

            /* background-color: red ; */

        }
        .td2{
            width: 50%;
             /* background-color:rgb(227, 227, 228) ; */
             font-size: 33px;
        }
        
        .td1-IMG{
            width: 30%; 
            background-color:rgb(227, 227, 228) ;

             /* background-color:rgb(47, 0, 255) ; */
             font-size: 33px;
        }
        .t2d2{
            width: 50%;
            background-color:rgb(227, 227, 228) ;
           
             /* background-color:rgb(47, 0, 255) ; */
             /* font-size: 22px;  */
            /* background-color: rgb(240, 145, 128) ; */

        }
        .bold{
            font-weight: bold;
        }
        .td3{
            width: 20%; 
            background-color: rgb(248, 198, 190) ;

        }
        .img-border{
            width:250px;
            height:200px;
            border:1px;
            border-style: solid;
        }
    </style>
</head>

<body>
  

<htmlpageheader name="page-header">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
  
    <div class="full-width">
        <table >
          <tr>
              <td class="td td1-IMG" rowspan="9" >
                    <img width="25%" height='150px' src='{{ $patient->photo }}'alt=""/>
              </td>
              <td class="td td2" rowspan="2">
                  الشهادة الصحية
              </td>
              <td class="td td3-QR"></td>
          </tr>
          <tr>
              <td class="td td3-QR"></td>
          </tr>
          <tr>
              <td class="td td2-IMG"></td>
              <td class="td td3-QR"></td>
          </tr>
          <tr>
              <td class="td td2-IMG"></td>
              <td class="td td3-QR"></td>
          </tr>
          <tr>
              <td class="td td2-IMG"></td>
              <td class="td td3-QR"rowspan="5" >
                <img width= "15%" src='data:image/png;base64,{{ $qr }}'alt=""/>

              </td>
          </tr>
          <tr>
              <td class="td td2-IMG"></td>
          </tr>
          <tr>
              <td class="td td2-IMG"></td>
          </tr>
          <tr>
              <td class="td td2-IMG"></td>
          </tr>
          <tr>
              <td class="td td2-IMG"></td>
          </tr>
       
       
        </table>
        </htmlpageheader>
        <br>
        <br>
        <br>
        <br>
    

      
        <table >
            <tr>
                <td class="td td1">Date</td>
                <td class="td t2d2 bold">{{ $patientRequest->created_at->format('Y-m-d')}}</td>
                <td class="td td3">التاريخ</td>
            </tr>
            <tr>
                <td class="td td1">Name</td>
                <td class="td t2d2 bold">{{ $patient->name}}</td>
                <td class="td td3">الاسم</td>
            </tr>
            <tr>
                <td class="td td1">Birthdate</td>
                <td class="td t2d2 bold">{{$patient->birth_date}}</td>
                <td class="td td3">تاريخ الميلاد</td>
            </tr>
            <tr>
                <td class="td td1">Age</td>
                <td class="td t2d2 bold">{{$patient->age}}</td>
                <td class="td td3">العمر</td>
            </tr>
            <tr>
                <td class="td td1">Gender</td>
                <td class="td t2d2 bold">{{$patient->gender}}</td>
                <td class="td td3">الجنس</td>
            </tr>
            <tr>
                <td class="td td1">Nationality</td>
                <td class="td t2d2 bold">{{$patient->nationality->name}}</td>
                <td class="td td3">الجنسية</td>
            </tr>
            <tr>
                <td class="td td1">Requesting authority</td>
                <td class="td t2d2 bold">{{$patient->requesting_authority}}</td>
                <td class="td td3">الجهة</td>
            </tr>
            <tr>
                <td class="td td1">Document type</td>
                <td class="td t2d2 bold">{{$patient->identityTypes()->where('request_id',$patientRequest->id)->first()->name}}</td>
                <td class="td td3">نوع المستند</td>
            </tr>
            <tr>
                <td class="td td1">Document Number</td>
                <td class="td t2d2 bold">{{$patient->identityTypes()->where('request_id',$patientRequest->id)->first()->pivot->identity}}</td>
                <td class="td td3">رقم  المستند</td>
            </tr>
        
        
        </table>
        <br>
        <table >
            <tr>
                <td class="td td1">Test </td>
                <td class="td t2d2">Result / النتيجة</td>
                <td class="td td3">الاختبار</td>
            </tr>
            @foreach ($patientRequest->results as $result)
            <tr>
                <td class="td td1">{{$result->test->name_en}}</td>
                <td class="td t2d2 bold">{{$result->value}}</td>
                <td class="td td3">{{$result->test->name_ar}}</td>
            </tr>
            @endforeach
            
        </table>
        <br>
        <br>
      
       
      

        <table >
            <tr>
                <td style=" width: 30%; ">
                    <h3>Signature</h3>
                    <br>
                    <br>
                ....................................................    
                </td>
                <td style=" width: 50%; ">
                    
                </td>
                <td style=" width: 20%; ">
                    <h3>Print</h3>
                    <br>
                    <br>
                ....................................................  
                </td>
            </tr>            
        </table>
    </div>


</body>

</html>
