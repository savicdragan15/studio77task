<div class="container">
    <h1>Enter your Email</h1>
    <form action="<?=_WEB_PATH?>register/registration" id="forgotPassword" method="POST">
    <div class="row col-md-6" style="margin: 0 auto;">
        
        <div class="form-group">
            <label for="usr">Email:</label>
            <input type="text" class="form-control" id="user_email" name="user_email">
       </div>

        <div class="form-group">
            <button id="send" type="submit" class="btn btn-lg btn-success btn-block">Send</button>
        </div>
    </div>
    </form>
    
    <script>
        
      function formValidates(){
          if($('#user_email').val() == ''){
            alert('Email filed is required');
            $('#user_email').focus();  
            return false
          }
        return true;
      }
      
        $('#send').click(function(e){
            e.preventDefault();
            var email = $('#user_email').val();
         if(formValidates()){
                $.ajax({
                url: "<?=_WEB_PATH?>register/forgotPasswordProcess",
                type: "POST",
                data: 'user_email='+email,
                success:function(response){
                    if(response.error == false){
                         $('#forgotPassword')[0].reset();
                        alert('Your new password sent to your email.');
                    }else{
                        alert('Error. Try again.');
                    }
                }
            });
            }
        });
    </script>