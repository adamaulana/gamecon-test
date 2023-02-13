<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Marvel Character</title>
</head>
<body>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <center>
                <h2 class="mt-5">
                    Marvel Character <br>
                    <small>Search your marvel characters</small> 
                </h2>
            </center>
            
                <!-- {{csrf_field()}} -->
                <div class="input-group">
                    <span class="input-group-text">http://localhost:8000/api/getChara/</span>
                    <input type="text" name="keyword" id="link_input" placeholder="?limit=20&page=10&keyword=bucky"  class="form-control" placeholder="Ketik nama karakter yang ingin di cari">                    
                </div>
                
                <button class="mt-3 btn btn-primary" id="getdata">GET</button>
                <table class="table">
                    <thead>
                        <th>Parameter</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>limit</td>
                            <td>Parameter to limiting result</td>
                        </tr>
                        <tr>
                            <td>keyword</td>
                            <td>search character by name</td>
                        </tr>
                        <tr>
                            <td>page</td>
                            <td>pagination to see result </td>
                        </tr>
                    </tbody>
                </table>
                <br>
            
        </div>
        <div class="col-md-2"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $("#getdata").click(function(){
        var param = $("#link_input").val();
        var link ='';
        if(param != ''){
            link = "http://localhost:8000/api/getChara/"+param;
        }else{
            link = "http://localhost:8000/api/getChara/";
        }
        window.open(link, '_blank');
    });
</script>
</body>
</html>