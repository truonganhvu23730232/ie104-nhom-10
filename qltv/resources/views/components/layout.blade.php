<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ isset($title) ?
        $title . ' - Quản lý thư viện công cộng' :
        'Quản lý thư viện công cộng' }}
    </title>
</head>
<body>
    {{ $slot }}
</body>
</html>