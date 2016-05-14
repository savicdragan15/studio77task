 <!-- Page Content -->
    <!-- Login form -->
    <div class="container">
        <div class="row">
           <?php if(!Session::get("name") && !Session::get("email")  && !Session::get("status")){?>
            <div class="col-md-6 col-sm-12 col-md-offset-3">
                <form class="form-signin" action="<?=_WEB_PATH?>home/login" method="POST">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input id="inputEmail" class="form-control" placeholder="Email address" name="email" required="" autofocus="" type="email"><br>
                <label for="inputPassword" class="sr-only">Password</label>
                <input id="inputPassword" class="form-control" placeholder="Password" name="password" required="" type="password"><br>
                <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
                <a href="<?=_WEB_PATH?>register" class="btn btn-lg btn-primary btn-block">Register</a>
                <a href="<?=_WEB_PATH?>register/forgotPassword" class="btn btn-lg btn-danger btn-block">Forot your password?</a>
              </form>
         </div>
           <?php }else if(Session::get("status") == _NIVO_PRISTUPA_ADMIN || Session::get("status") == _NIVO_PRISTUPA_USER ){?>
               <div class="col-md-6 col-sm-12 col-md-offset-3"> 
                   <h3 class="form-signin-heading">Loged in as <?= Session::get("name") ?> <a href="<?=_WEB_PATH?>home/logOut"> <button type="button" class="btn btn-danger">Logout</button></a></h3> 
               </div>
           <?php } ?>
        </div>
  <!-- EOF Login form -->
  <hr />
        <!-- Features Section -->
   <?php foreach($articles as $article){?>
      <div class="row">
            <div class="col-md-1 text-center">
                <p><i class="fa fa-newspaper-o fa-4x"></i>
                </p>
                <p><?= $article->article_date_time ?></p>
            </div>
            <div class="col-md-5">
                    <img alt="" src="<?=_WEB_PATH?>views/img/<?=$article->image_small_name?>" class="img-responsive img-hover">
            </div>
            <div class="col-md-6">
                <h3>
                    <a href="<?=_WEB_PATH?>articles/article/<?=$article->id?>/<?=str_replace(" ", "_", $article->article_title)?>"><?= $article->article_title?></a>
                </h3>
                </p>
                <p><?=substr($article->article_description,0,250)?>...</p>
                <a href="<?=_WEB_PATH?>articles/article/<?=$article->id?>/<?=str_replace(" ", "_", $article->article_title)?>" class="btn btn-primary">Read More <i class="fa fa-angle-right"></i></a>
            </div>
      </div><br>
   <?php } ?>     
        <!-- /.row -->