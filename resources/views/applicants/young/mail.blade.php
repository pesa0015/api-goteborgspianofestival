<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div>
        <span>Namn: {{ $applicant['name'] }}</span>
        <br />
        <br />
        <span>Ålder: {{ $applicant['age'] }}</span>
        <br />
        <br />
        <span>Mobilnummer: {{ $applicant['mobileNumber'] }}</span>
        <br />
        <br />
        <span>E-post: {{ $applicant['email'] }}</span>
        <br />
        <br />
        <span>Lärarens namn: {{ $applicant['teacherName'] }}</span>
        <br />
        <br />
        <span>Lärarens tel: {{ $applicant['teacherMobileNumber'] }}</span>
        <br />
        <br />
        <span>Jag önskar medverka i mästarklass: {{ $applicant['participateMasterclass'] ? 'Ja' : 'Nej' }}</span>
        <br />
        <br />
        <span>Jag önskar delta i konsert: {{ $applicant['participateConsert'] ? 'Ja' : 'Nej' }}</span>
        <br />
        <br />
        @if (isset($applicant['toPlayOnMasterClass']))
            <span>Vad vill du spela på mästarklass? {{ $applicant['toPlayOnMasterClass'] }}</span>
            <br />
            <br />
        @endif
        @if (isset($applicant['toPlayOnConcert']))
            <span>Vad vill du spela på konsert? {{ $applicant['toPlayOnConcert'] }}</span>
            <br />
            <br />
        @endif
    </div>
</body>
</html>