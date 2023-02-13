<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 row">
            <center>
                <h2 class="mt-5">
                    Create Diamond Pattern<br> 
                </h2>
            </center>
            

                <input type="text" name="n" id="n"   class="form-control" placeholder="input N">
                <span>Note : N >= 3</span>
                <br>                                    
                <button class="mt-3 btn btn-primary" id="generate">Generate</button>
                
                <br>
                <strong> Source Code : </strong> 
                <code style="font-size:19px;">
                <pre>
public function generate(Request $req){
    $n = $req->n;
    $rowNum = $n - 1;
    $space = $rowNum-1;
    for($i=1; $i<=$rowNum; $i++)
    {
        for($j=1; $j<=$space; $j++){
            echo "+";
        }
        for($j=1; $j<=(2*$i-1); $j++){
            echo "-";
        }
        for($j=1; $j<=$space; $j++){
            echo "+";
        }
        $space--;

        echo "&gtbr&gt";
    }
    $space = 1;
    for($i=1; $i<=($rowNum-1); $i++)
    {
        for($j=1; $j<=$space; $j++){
            echo "+";
        } 
        for($j=1; $j<=(2*($rowNum-$i)-1); $j++){
            echo "-";
        }
        for($j=1; $j<=$space; $j++){
            echo "+";
        }
        $space++;
        echo "&gtbr&gt";
    }
}
                </pre>
                </code>
            
        </div>
        <div class="col-md-2"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $("#generate").click(function(){
        var param = $("#n").val();
        link = "http://localhost:8000/api/getPattern/?n="+param;

        window.open(link, '_blank');
    });
</script>
</body>
</html>