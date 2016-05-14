<div id="page-wrapper" >
    <div id="page-inner">
         <h2 class="naslov"> Insert Articles</h2>
        <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
            <div class="form-group">
                <form action="" method="POST" id="insert_article">
                    <i class="fa fa-file-text-o"></i> <label for="name">Article title:</label>
                    <input class="form-control" id="article_title" name="article_title"  placeholder="Title">
                    <br>
                    <div class="form-group">
                       <i class="fa fa-picture-o"></i> <label>Article image</label>
                       <input type="file" id="image_to_upload" required>
                        <span id="image"></span>
                    </div>
                    <br>
                    <i class="fa fa-file-text-o"></i> <label for="surname">Article description:</label>
<!--                    <input class="form-control" id="surname" name="user_surname"  placeholder="Prezime...">-->
                    <textarea id="description"></textarea>
                    <br>
                    <div class="form-group">
                        <i class="fa fa-file-text-o"></i> <label>Article status  <b style="color: red"> 1 - show 0 - hide</b></label>
                       <input class="form-control" id="article_status" name="article_status"  placeholder="Article status">
                    </div>
                    <button class="btn btn-success" type="submit" name="btn_submit" id="btn_insert_article" value="Unesi">Insert  <i class="fa fa-angle-right"></i></button>
                    <button class="btn btn-default" type="reset">Reset  <i class="fa fa-refresh"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
    
    <script>   
  function validates(){
      if($('#article_title').val() == ''){
          alert("Article title field is required.");
          $('#article_title').focus();
          return false;
      }
      if($('#description').val() == ''){
          alert("Description field is required.");
          $('#description').focus();
          return false;
      }
      
      if($('#article_status').val() == ''){
          alert("Article status field is required.");
          $('#article_status').focus();
          return false;
      }
      
      return true;
  }        
    formdata = new FormData(); 
     $("#image_to_upload").on("change", function() {
      var file = this.files[0];
        formdata.append("image", file);
        console.log(formdata);
    });
    
    $('#btn_insert_article').click(function(e){
        e.preventDefault();
        tinymce.triggerSave();
        formdata.append("article_description",$('#description').val());
        formdata.append("article_title", $('#article_title').val());
        formdata.append("article_status", $('#article_status').val());
    if(confirm("Are you sure?") && validates()){   
     $.ajax({
        url: "insert",
        type: "POST",
        data: formdata,
        processData: false,
        contentType: false,
        success:function(response){
            if(response.error == false){
                 $('#insert_article')[0].reset();
                alert('You have successfully article added.');
                location.reload();
            }else{
                alert('Error. Try again!');
            }
        }
        });
        }
    });
</script>