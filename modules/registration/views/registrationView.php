<div class="container">
    <h1>Enter your data to register</h1>
    <form action="<?=_WEB_PATH?>register/registration" method="POST">
    <div class="row col-md-6" style="margin: 0 auto;">
        <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" id="usr" name="user_name">
       </div>
        
        <div class="form-group">
            <label for="usr">Surname:</label>
            <input type="text" class="form-control" id="usr" name="user_surname">
       </div>
        
        <div class="form-group">
            <label for="usr">Email:</label>
            <input type="text" class="form-control" id="usr" name="user_email">
       </div>
        
       <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="user_password">
       </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success btn-block">Send</button>
        </div>
    </div>
    </form>

  
