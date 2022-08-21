<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SentiCart API</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
        }

        .flex {
            background-color: #1e293b;
            color: #f8fafc;
            margin: 0px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            margin-top: 16px;
            margin-bottom: 16px;
        }

        p {
            margin-top: 0;
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="flex">
        <img src="./images/pizza.png">
        <h1>SentiCart API</h1>
        <p>SentiCart is Green Module Systems' smart shopping cart project.</p>
        <p>This is the API used by the system to monitor and track the carts' location and status.</p>
    </div>
</body>

</html>