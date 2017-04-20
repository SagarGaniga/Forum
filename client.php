<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  </head>
  <body>

  <h2> Client example </h2>
  <h3>Output: </h3>
  <div id="output">this element will be accessed by jquery and this text replaced</div>

  <script id="source" language="javascript" type="text/javascript">

  $(function () 
  {
    $.ajax({                                      
      url: 'api.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
        var id = data[0];              //get id
        var vname = data[1];           //get name
        $('#output').html("<b>id: </b>"+id+"<b> name: </b>"+vname); //Set output element html
      } 
    });
  }); 

  </script>
  </body>
</html>