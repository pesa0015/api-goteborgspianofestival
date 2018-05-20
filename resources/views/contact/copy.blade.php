<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div>
        <span id="hello">Hej {{ $contact['name'] }}</span>
        <br />
        <br />
        <span>Vi har fått ditt meddelande och kommer att återkomma inom kort. Här är en kopia av det du fyllt i:</span>
        <br />
        <br />
        <span>--</span>
        <br />
        <br />
        <span>Namn: {{ $contact['name'] }}</span>
        <br />
        <span>E-postadress: {{ $contact['email'] }}</span>
        <br />
        <span>Ämne: {{ $contact['subject'] }}</span>
        <br />
        <span>Meddelande:</span>
        <br />
        <span>{{ $contact['message'] }}</span>
    </div>
</body>
</html>