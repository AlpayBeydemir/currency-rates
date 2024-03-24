<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            margin: 20px;
        }

        .currency-card {
            margin-bottom: 20px;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1 class="mb-4">{{ $title }}</h1>
        <div class="row">
            @foreach ($cheapestRates as $currency => $rate)
                <div class="col-md-4">
                    <div class="card currency-card">
                        <div class="card-header">
                            {{ $currency ?? '' }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $rate->full_name ?? '' }}</h5>
                            <p class="card-text">Fiyat: {{ $rate->price ?? '' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="mb-4">The Most Cheapest Currency</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card currency-card">
                    <div class="card-header">
                        {{ $cheapestCurrency->short_code ?? '' }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $cheapestCurrency->full_name ?? '' }}</h5>
                        <p class="card-text">Fiyat: {{ $cheapestCurrency->price ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
