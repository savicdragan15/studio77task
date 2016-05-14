<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
  <style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Slider Administration</h2>
                        
                        <div class="form-group">
                            <form action="" method="POST" id="insert_slider_image">
                                
                                <div class="form-group">
                                <i class="fa fa-file-text-o"></i> <label for="image_title">Image slider title:</label>
                                <input class="form-control" id="image_title" name="image_title"  placeholder="Image title">
                                </div>
                               
                                <div class="form-group">
                                    <i class="fa fa-picture-o"></i> <label>Slider image:</label>
                                    <input type="file" id="slider_image_to_upload" required>
                                     <span style='color: red;'>Recomended picture size 1900x600</span>
                                    <span id="image"></span>
                                </div>
                                
                                <div class="form-group">
                                <i class="fa fa-file-text-o"></i> <label for="image_status">Image status:</label>
                                  <input class="form-control" id="image_status" name="image_status"  placeholder="Image status...">
                                </div>
                                <button class="btn btn-success" type="submit" name="btn_submit" id="btn_insert_image" value="Unesi">Insert  <i class="fa fa-angle-right"></i></button>
                                <button class="btn btn-default" type="reset">Reset  <i class="fa fa-refresh"></i></button>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <button title="refresh_images" class="btn btn-primary" id="refresh_image"><i class="fa fa-refresh"></i></button> <img id="images_loader" style="width: 60px; display: none;" src="<?=_WEB_PATH?>views/img/loader.gif" />
                <img id='insert_upload_loader' style='width: 60px; display: none;' src='<?=_WEB_PATH?>views/img/loader.gif' />
                <div class="row">
                    <div id="row_images"></div>
                </div>
            </div>
    
    <script>
 
$(document).ready(function(){
     var dialog_image = $( "#dialog_image" ).dialog({
      autoOpen: false,
      height: 600,
      width: 550,
      modal: true,
      buttons: {
        'Close': function() {
          dialog_image.dialog( "close" );
        }
      },
      close: function() {
        dialog_image.dialog( "close" ); 
      }
    });
  function validateForm(){
      var image_title = $('#image_title');
      var image_status =  $('#image_status');
      
      if(image_title.val() == ''){
          alert('Image title field required');
          image_title.focus()
          return false;
      }
     if(image_status.val() == ''){
          alert('Image status field required');
          image_status.focus()
          return false;
      }
      return true;
  }
  function getImages(){
      var content = '';
      $('#images_loader').show();
    $.ajax({
        url: "getImageSlider",
        type: "POST",
        success:function(response){
          if(response.error == false){
            $.each(response.data, function(index, value){
                content += "<div class='col-md-4' style='margin-top: 20px;'>";
                content += "<img style='width: 500px; height: 250px;' src='<?=_WEB_PATH?>views/img/"+value.image_name_small+"' />";
                content += "<p><b>Title:</b>"+value.image_title+"</p>";
                content += "<button style='margin:2px;' title='edit' id='edit_text' data-id='"+value.id+"' class='btn btn-primary' ><i class='fa fa-pencil'></i></button>";
                content += "<button title='edit' id='delete_image' data-id-image='"+value.id+"' class='btn btn-danger' ><i class='fa fa-trash-o'></i></button>";
                content += "</div>";
            });
            $('#row_images').html(content);
            $('#images_loader').hide();
          }else{
            $('#row_images').html("Error. Try Again");
          }
        }
    });
  }
  
  function deleteImage(image_id){
  if(confirm('Are you sure?')){
      $('#insert_upload_loader').show();
        $.ajax({
            url: "<?=_WEB_PATH?>admin/deleteSliderImage",
            type: "POST",
            data: 'image_id='+image_id,
            success:function(response){
               if(response.error == false){
                 alert('You have successfully delete slider image.');
                 $('#insert_upload_loader').hide();
                 getImages();
            }else{
                $('#insert_upload_loader').hide();
                alert("Error try again!");
            }
            }
        });
    }
  }
  
 function getImageById(image_id){
   var content = "";
    $.ajax({
        url: "getSliderImageById",
        type: "POST",
        data: {'id':image_id},
        success:function(response){
           if(response.error == false){
             content +="<form id='slider_image'>";
             content +="<fieldset>";
             content +="<input type='hidden' id='image_update_id' data-id='"+response.data.id+"'>";
             content +="<label>Image title:</label>";
             content += "<input type='text' data-val='"+response.data.image_title+"' id='image_update_title' name='image_update_title' value='"+response.data.image_title+"' class='text ui-widget-content ui-corner-all'>";
             content += "<button id='update_image_title' class='btn btn-success btn-xs'>Update title</button><br><br>";
             content +="<div><img style='width:500px;'src='<?=_WEB_PATH?>/views/img/"+response.data.image_name_small+"' alt='slika' /></div><br>";
             content +="<input type='file' name='image'  id='image_to_upload'>";
             content +="<span style='color: red;'>Recomended picture size 1900x600</span>";
             content += "<img id='upload_loader' style='width: 60px; display: none;' src='<?=_WEB_PATH?>views/img/loader.gif' />"
             content += "</fieldset></form>";
             
           }
            $('#dialog_image').html(content);
        }
    }); 
 }
 getImages(); 
 
 $('body').on('click', '#refresh_image', function(){
     getImages();
 });
 
 $('body').on('click', '#edit_text', function(){
      dialog_image.dialog( "open" );
      var image_id = $(this).attr('data-id');
      getImageById(image_id);
 });
 
 $('body').on('click', '#delete_image', function(){
     deleteImage($(this).attr('data-id-image'));
 });
 
 $('body').on('change', '#slider_image_to_upload', function(){
     data = new FormData();
     var image = this.files[0];
     data.append('image',image);
 });
 $('body').on('click', '#btn_insert_image', function(e){
     e.preventDefault();
    var image_title = $('#image_title').val().trim();
    var image_status = $('#image_status').val().trim();
  if(confirm("Are you sure?") && validateForm() && data){ 
      $('#insert_upload_loader').show();
        data.append('image_title',image_title);
        data.append('image_status',image_status);
        $.ajax({
            url: "<?=_WEB_PATH?>admin/insertSliderImage/",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            success:function(response){
               if(response.error == false){
                $('#insert_slider_image')[0].reset();
                 $('#insert_upload_loader').hide();
                 alert('You have successfully insert slider image.');
                 getImages();
                 location.reload();
            }else{
                $('#insert_upload_loader').hide();
                alert("Error try again!");
            }
            }
    }); 
    }
 });
 
 $('body').on('click', '#update_image_title', function(e){
    e.preventDefault();
    title = new FormData();
    title.append('id',$('#image_update_id').attr('data-id'));
    title.append('image_title',$('#image_update_title').val());
    console.log(title);
     $.ajax({
        url: "<?=_WEB_PATH?>admin/updateTitleSliderImage",
        type: "POST",
        data: title,
        processData: false,
        contentType: false,
        success:function(response){
           if(response.error == false){
             getImageById($('#image_update_id').attr('data-id'));
             getImages();
             //dialog_image.dialog('close');
             $('#upload_loader').hide();
        }else{
            $('#upload_loader').hide();
            alert("Error try again!");
        }
    }
});
 });
  formdata = new FormData();      
    $(document).on("change",'#image_to_upload', function() {
    dialog_image.dialog('open');
        $('#upload_loader').show();
        var file = this.files[0];
        var id = $('#image_update_id').attr('data-id');
        
        if (formdata) {
            formdata.append("image", file);
            formdata.append("id",id);
            console.log(id);
            //console.log(formdata);
            $.ajax({
                url: "<?=_WEB_PATH?>admin/updateSliderImage/"+id,
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success:function(response){
                   if(response.error == false){
                     getImageById(id);
                     getImages(); 
                     $('#upload_loader').hide();
                }else{
                    $('#upload_loader').hide();
                    alert("Error try again!");
                }
                }
            });
        }                       
    });
  });
    </script>
    <div id="dialog_image"></div>
