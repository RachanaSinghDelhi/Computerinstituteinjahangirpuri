<!-- resources/views/pdf/certificates.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
        .certificate-container {
            width: 210mm; /* A4 width */
            height: 297mm; /* A4 height */
            position: relative;
            page-break-inside: avoid;
            box-sizing: border-box;
        }
        .background-image {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            object-fit: cover;
        }
         .content {
            width: 80%;
            z-index: 1; /* Ensure text appears above the background */
            position:absolute;
            padding: 30mm;
            text-align: left;
            color: #000;
            font-size:22px;
        
        }
       
       
      
        .id {float:right; margin-top:60px; margin-right:225px;}
        .name {float:left; margin-top:60px;margin-left:60px;}
        .father {float:left; margin-top:100px;margin-left:80px;}
        .type {float:left; margin-top:50px;margin-left:120px;}
        .adm {float:left; margin-top:20px; margin-left:210px;  font-size:22px;}
        .dur {position:absolute; top:330px;left:590px; font-size:24px;}
        .desc {position:absolute;top:365px;margin-left:170px;   text-indent: 170px; margin:0px; line-height: 1.4;font-size:22px; width:70%;}
        .grade {margin-top:350px;margin-left:400px; font-size:24px; }
        .code {margin-top:10px;margin-left:280px; font-size:18px; }
        .issudt {margin-top:30px; margin-left:280px;}
        
    </style>
</head>
<body>
    @foreach ($certificates as $certificate)
        <div class="certificate-container">
        <img src="{{ public_path('assets/images/certificate.jpg') }}" alt="Certificate Background" class="background-image">
            <div class="content" style="margin-top:200px;">
         
                <div class="id"><strong><u> {{ $certificate->student_id }}</u></strong></div>
                <div class="name"><u>{{ $certificate->name }}</u></div>
                <div class="father"><u>{{ $certificate->father }}</u></div>
                <div class="type"><u> {{ $certificate->certificate_type }}</u></div>
                <div class="adm"><u>{{ \Carbon\Carbon::parse($certificate->dt)->format('d M Y') }}</u></div>
                  <div class="dur"><u> {{ $certificate->duration }}</u></div>
                <div class="desc"><u>{{ $certificate->description }}</u></div>
                <div class="grade"><u>{{ $certificate->grade }}</u> </div>
                <div class="issudt">
    <u>{{ \Carbon\Carbon::parse($certificate->date)->isoFormat('dddd, MMMM D, YYYY') }}</u>
</div>
                <div class="code"> <u>{{ $certificate->code }}</u></div>
                <div>
            <img src="{{ public_path('storage/students/' . $certificate->photo) }}" 
                 alt="Student Photo" 
                 style="position: absolute; top: 90px; right: 150px; width: 90px; height: 100px;   border: 1px solid #000;" />
        </div>
            </div>
        </div>
    @endforeach
</body>
</html>
