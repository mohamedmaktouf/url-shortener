<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Lien
                </div>
                <div class="card-body">
                    <p><strong>Url court:</strong> <a href="{{ url($shortUrl) }}" target="_blank">{{ url($shortUrl) }}</a></p>
                    <p><strong>Url original:</strong> <a href="{{ $originalUrl }}" target="_blank">{{ $originalUrl }}</a></p>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
