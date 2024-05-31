<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show </title>
</head>
<body>
<div class="container">
    <h1>Client Details</h1>
    <p><strong>Name (EN):</strong> {{ $client->full_name_en }}</p>
    <p><strong>Name (AR):</strong> {{ $client->full_name_ar }}</p>
    <p><strong>User Name:</strong> {{ $client->user_name }}</p>
    <p><strong>Email:</strong> {{ $client->email }}</p>
    <p><strong>Mobile:</strong> {{ $client->mobile }}</p>
    <p><strong>Country:</strong> {{ $client->country }}</p>
    <h2>Weather</h2>
    <p><strong>Temperature:</strong> {{ $weather['current']['temp_c'] }}°C</p>
    <p><strong>Condition:</strong> {{ $weather['current']['condition']['text'] }}</p>
</div>
</body>
</html>