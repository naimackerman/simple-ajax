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
    </style>
</head>
<body>
    <button class="btn button-color" onclick="window.location.href='../'">Back</button>

    <div class="container mb-5">
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
                <div class="form-group">
                    <label class="font-weight-bold">Kecamatan</label>
                    <select class="form-control" name="kecamatan" id="kecamatan">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Kelurahan</label>
                    <select class="form-control" name="kelurahan" id="kelurahan">
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
    
            $("#kabupaten").change(function(){
            var kabupaten = $("#kabupaten").val();
                $.ajax({
                    type: 'POST',
                    url: "get_kecamatan.php",
                    data: {kabupaten: kabupaten},
                    cache: false,
                    success: function(msg) {
                        $("#kecamatan").html(msg);
                    }
                });
            });
    
            $("#kecamatan").change(function(){
            var kecamatan = $("#kecamatan").val();
                $.ajax({
                    type: 'POST',
                    url: "get_kelurahan.php",
                    data: {kecamatan: kecamatan},
                    cache: false,
                    success: function(msg) {
                        $("#kelurahan").html(msg);
                    }
                });
            });
        });
    </script>
</body>
</html>