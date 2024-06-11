<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Error - Something went wrong</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f7f6;
        color: #333;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100vh;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        font-size: 24px;
        color: #333;
    }

    p {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
    }

    a {
        display: inline-block;
        background-color: #4CAF50;
        color: #ffffff;
        padding: 10px 20px;
        margin-top: 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        background-color: #45a049;
    }

    .error-code {
        color: #999;
        margin-top: 10px;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Oops! Something went wrong.</h1>
    <p>We are experiencing some technical problems. Please try again later. If the problem persists, do not hesitate to contact us.</p>
    <a href="{{ URL::previous() }}">Go back</a>
    <p class="error-code">Error 500</p>
</div>
</body>
</html>
