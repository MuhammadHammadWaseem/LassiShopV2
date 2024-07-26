<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container text-center">
        <div class="row mt-5 ">
            <div class="col-md-2">
                <p class="mb-0">For Online Site Link</p>
                <a href="{{ route('online.links') }}"  id="container" target="_blank">{!! $simple !!}</a><br />
                <button id="download" class="mt-2 btn btn-info text-light" onclick="downloadSVG()">Download
                    SVG</button>
            </div>
        </div>
    </div>
</body>

<script>
    function downloadSVG() {
        const svg = document.getElementById('container').innerHTML;
        const blob = new Blob([svg.toString()]);
        const element = document.createElement("a");
        element.download = "onlineSiteLink.svg";
        element.href = window.URL.createObjectURL(blob);
        element.click();
        element.remove();
    }
</script>

</html>
