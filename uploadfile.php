<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Laporan</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #535c68;
        }

        .wrapper {
            margin: auto;
            max-width: 640px;
            padding-top: 60px;
            text-align: center;
        }

        .container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            /*border: 0.5px solid rgba(130, 130, 130, 0.25);*/
            /* box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(0, 0, 0, 0.1); */
        }

        h1 {
            color: #130f40;
            font-family: 'Varela Round', sans-serif;
            letter-spacing: -.5px;
            font-weight: 700;
            padding-bottom: 10px;
        }

        .upload-container {
            background-color: rgb(239, 239, 239);
            border-radius: 6px;
            padding: 10px;
        }

        .border-container {
            border: 5px dashed rgba(198, 198, 198, 0.65);
            border-radius: 6px;
            padding: 20px;
        }

        .border-container p {
            color: #130f40;
            font-weight: 600;
            font-size: 1.1em;
            letter-spacing: -1px;
            margin-top: 30px;
            margin-bottom: 0;
            opacity: 0.65;
        }

        #file-browser {
            text-decoration: none;
            color: rgb(22, 42, 255);
            border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
        }

        #file-browser:hover {
            color: rgb(0, 0, 255);
            border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
        }

        .icons {
            color: #95afc0;
            opacity: 0.55;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>Upload a file</h1>
            <div class="upload-container">
                <div class="border-container">
                    <div class="icons fa-4x">
                        <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                        <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                        <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                    </div>
                    <!--<input type="file" id="file-upload">-->
                    <p>Drag and drop files here, or
                        <a href="#" id="file-browser">browse</a> your computer.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#file-upload").css("opacity", "0");

        $("#file-browser").click(function (e) {
            e.preventDefault();
            $("#file-upload").trigger("click");
        });
    </script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <!-- Fontawesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>
</body>

</html>