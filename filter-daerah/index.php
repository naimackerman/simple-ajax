<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Daerah</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/plasticine/100/000000/bull.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        body{
            background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
            font-family: sans-serif;
            color: white;
        }
        body:after {
            content:'';
            background: url('./bg.jpg') no-repeat center center;
            background-size: cover;
            position: absolute;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index:-1;
            opacity: 1;
        }
        h2 {
            text-align: center;
        }
        button {
            width: 100px;
            margin: 20px;
        }
        .button-color {
            margin: 1%;
            background-color: #15F4EE;
        }
        .button-color:hover {
            background-color: #03AECC;
        }
        .data{
            margin-top: 5%;
            border-radius: 1rem;
            position: relative;
            z-index: 1;
            padding: 5%;
            box-shadow: 0 0 24px 2px #47066e;
        }
        .data::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: .8;
            z-index: -1;
            border-radius: 1rem;
            background-color:rgba(0, 0, 0, 1);
        }
    </style>
</head>
<body>
    <button class="btn button-color" onclick="window.location.href='../'">Back</button>

    <div class="container mb-5 data">
        <h2>Pilih Daerah</h2> <hr/>
    
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="font-weight-bold">Provinsi</label>
                    <select class="form-control" name="provinsi" id="provinsi">
                        <option value=""> Pilih Provinsi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Kabupaten</label>
                    <select class="form-control" name="kabupaten" id="kabupaten">
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>
        <hr />
    </div>
    <script>
        $(document).ready(function(){
            $.ajax({
                type: 'POST',
                url: "get_provinsi.php",
                cache: false, 
                success: function(msg) {
                    $("#provinsi").html(msg);
                }
            });
    
            $("#provinsi").change(function(){
            var provinsi = $("#provinsi").val();
                $.ajax({
                    type: 'POST',
                    url: "get_kabupaten.php",
                    data: {provinsi: provinsi},
                    cache: false,
                    success: function(msg) {
                        $("#kabupaten").html(msg);
                    }
                });
            });
        });
    </script>
</body>
</html>