<!DOCTYPE html>
<html>
    
<head>
    
    <meta charset="utf-8">
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <script src="https://checkout.culqi.com/v2"></script>
    
    <script>
        
        //Esto habilita las funciones de messenger
        
    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/messenger.Extensions.js";
      fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'Messenger'));
    </script>
    
</head>
    
<body>
    
    <h1>Contrato de arrendamiento: S/.20.00</h1>
    
    <script>
    Culqi.publicKey = 'pk_test_FJ62jCwwtCVCOxxo';
    Culqi.init();
    </script>
    
    <div class="contenedor">
    
    <form action="" method="POST" id="culqi-card-form">
        <div>
            <label>
                <span>Correo Electrónico</span>
                    <input type="text" name="email" size="50" data-culqi="card[email]" id="card[email]">
            </label>
        </div>
        
        <div>
            <label>
                <span>Número de tarjeta</span>
                    <input type="text" size="20" data-culqi="card[number]" id="card[number]">
            </label>
        </div>
        
        <div>
            <label>
                <span>CVV</span>
                    <input type="text" size="4" data-culqi="card[cvv]" id="card[cvv]">
            </label>
        </div>
        
        <div>
            <label>
                <span>Fecha expiración (MM/YYYY)</span>
                    <input type="text" size="2" data-culqi="card[exp_month]" id="card[exp_month]">
            </label>
          
        <span>/</span>
          
            <input type="text" size="4" data-culqi="card[exp_year]" id="card[exp_year]">
        </div>
        
        <div>
        
            <button type="submit" name="enviar">Comprar</button>
            
        </div> 
        
    </form>

        
    <script>
        function culqi() {

            if(Culqi.token) {
                
                var token = Culqi.token.id;
                $.ajax({
                    url: 'servidordepago.php',
                    method: 'post',
                    data: {
                        token: token,
                        monto: 2000,
                        email: $('input[name="email"]').val()
                    },
                    dataType: 'JSON',
                    success: function(data){
                        //funcion para cerrar webview en messenger
                    MessengerExtensions.requestCloseBrowser(function success() {
                        // webview closed
                    }, function error(err) {
                      // an error occurred
                    });
                 
                    },
                    error: function(error_data){
                        console.log(error_data);
                    }
                });
            }else{
                console.log(Culqi.error);
                alert(Culqi.error.mensaje);
            }
        };
        
        $(document).ready(function(){
           $('#culqi-card-form').on('submit',function(e){
               e.preventDefault();
               
                Culqi.createToken();
               
           });
        });
        
        
    </script>

    
    </div>
    </body>
    
</html>