<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div>
        <span id="hello">Hej {{ $applicant['name'] }}</span>
        <br />
        <br />
        <span>Ålder: {{ $applicant['age'] }}</span>
        <br />
        <br />
        <span>Adress: {{ $applicant['address'] }}</span>
        <br />
        <br />
        <span>Mobilnummer: {{ $applicant['mobileNumber'] }}</span>
        <br />
        <br />
        <span>E-post: {{ $applicant['email'] }}</span>
        <br />
        <br />
        <span>Yrke/studier: {{ $applicant['job/study'] }}</span>
        <br />
        <br />
        <span>Har du körkort? {{ $applicant['driverLicense'] ? 'Ja' : 'Nej' }}</span>
        <br />
        <br />
        <span>Uppehälle/boende till deltagare: {{ $applicant['offerRoom'] ? 'Ja' : 'Nej' }}</span>
        <br />
        <br />
        <span>Vilka dagar/timmar kan du?</span>
        <br />
        <span>{{ $applicant['availability'] }}</span>
        <br />
        <br />
        <span>Berätta lite om dig själv:</span>
        <br />
        <span>{{ $applicant['aboutMe'] }}</span>
        <br />
        <br />
        <span>--</span>
        <br />
        <br />
        <span>Med vänliga hälsningar,</span>
        <br />
        <br />
        <span>Göteborgs pianofestival</span>
    </div>
</body>
</html>