<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div>
        <span>Ansökan om medlemskap i Göteborgs Pianofestival.</span>
        <br />
        <br />
        <span>Namn: {{ $member['name'] }}</span>
        <br />
        <span>E-post: {{ $member['email'] }}</span>
        <br />
        <span>Tel: {{ $member['mobileNumber'] }}</span>
    </div>
</body>
</html>