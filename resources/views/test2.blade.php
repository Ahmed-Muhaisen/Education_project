<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <body>
    <div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
$(document).ready(function(){


    contint='<ul class="list-group">';
  $("button").click(function(){
    $.ajax({
    url: "http://localhost:8000/api/Category",
    method:'get',
    success:function(re){
        re.data.forEach(e => {

            contint += '<li class="list-group-item">'+JSON.parse(e.name)['en']+'</li>';
        });
        contint +='</ul>';
        $("#div1").html(contint)
    }

    })





  });
});
</script>



  </body>
</html>
