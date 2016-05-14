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
                <h2>Edit Administration</h2>
                <div class="row">
                    <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Article title</th>
                                            <th>Created</th>
                                            <th>Article status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php foreach($articles as $article){?>
                                        <tr class="odd gradeX">
                                            <td><?=$article->id?></td>
                                            <td><?=$article->article_title?></td>
                                            <td><?=$article->article_date_time?></td>
                                            <td><?php echo ($article->article_status==1)?"<span style='color:blue'>show</span>":"<span style='color:red'>hide</span>";?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary edit_article" title="edit" data-id="<?=$article->id?>"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-primary edit_image" title="edit image" data-id="<?=$article->id?>"><i class="fa fa-picture-o"></i></button>
                                            </td>
                                        </tr>
                                     <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
            </div>
        </div>
         <!-- /. ROW  -->
         <hr />

</div>
     <!-- /. PAGE INNER  -->
    </div>


<script>
    function getArticle(id){
       $.ajax({
        url: "get",
        type: "POST",
        data: {'id':id},
        success:function(response){
          renderContent(response);
        }
        });
    }
    function renderContent(response){
        tinymce.remove("textarea");
        var content = "";
        if(response.error == false){
            content += "<form id='article'>";
            content += "<fieldset>";
            content += "<input type='hidden' id='article_id' data-id='"+response.data.id+"'>";
            content += "<label>Article title:</label>";
            content += "<input type='text' name='article_title' value='"+response.data.article_title+"' class='text ui-widget-content ui-corner-all'><br>";
            content += "<label>Article description:</label>";
            content += "<textarea name='article_description' id='text_tinymce'></textarea><br>";
            content += " <label >Article status</label>";
            content += "<input id='text' name='article_status' value='"+response.data.article_status+"' class='text ui-widget-content ui-corner-all'><br>";
            content += "<input type='submit' tabindex='-1' style='position:absolute; top:-1000px'>";
            content += "</fieldset></form>";
          $('#dialog').html(content);
           tinymce.init({
         selector:'textarea', 
             height : 300,
             max_width: 500,
         });
        tinyMCE.activeEditor.setContent(response.data.article_description);
          
        }else{
          
        }
    }
    function renderContentImage(response){
      tinymce.remove("textarea");
      var content = ""; 
      if(response.error == false){
        content +="<form id='article_image'>";
        content +="<fieldset>";
        content +="<input type='hidden' id='image_id' data-id='"+response.data[0].id+"'>";
        content +=" <label>Article image:</label>";
        content +="<div><img src='<?=_WEB_PATH?>/views/img/"+response.data[0].image_small_name+"' alt='slika' /></div><br>";
        content +="<input type='file' name='image'  id='image_to_upload'>";
        content += "</fieldset></form>";
        $('#dialog_image').html(content);
      }
    }

    //jQuery.noConflict();    
    formdata = new FormData();      
    $("body").on("change",'#image_to_upload', function() {
        var file = this.files[0];
        var id = $('#image_id').attr('data-id');
        console.log(file);
        if (formdata) {
            formdata.append("image", file);
            formdata.append("id",id);
            console.log(formdata);
            jQuery.ajax({
                url: "uploadImage",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success:function(response){
                   if(response.error == false){
                      getImageArticle(id);
                }else{
                    alert("Error try again!");
                }
                }
            });
        }                       
    });

    function save(){
    tinymce.triggerSave();
        $.ajax({
          url: "save",
          type: "POST",
          data: $('#article').serialize()+"&id="+$('#article_id').attr('data-id'),
          success:function(response){
            if(response.error == false){
            getArticle($('#article_id').attr('data-id'));
            alert('You have successfully update article!');
          }else{
              alert('You have error or check that the data has changed!');
          }
          }
      });
    }
    
  function getImageArticle(id){
       $.ajax({
        url: "getImage",
        type: "POST",
        data: {'id':id},
        success:function(response){
          renderContentImage(response);
        }
      });
  }  
  
  $('body').on("click", ".edit_article",function(){
            $( "#dialog" ).dialog('open');
            getArticle($(this).attr('data-id'));
    });
    
  $('body').on('click', '.edit_image', function(){
         $( "#dialog_image" ).dialog('open');
         getImageArticle($(this).attr('data-id'));
  });

  $(document).ready(function () {
    $('#dataTables-example').dataTable();
    
    /**
     * dialog article options
     * 
     */
  var dialog = $( "#dialog" ).dialog({
      autoOpen: false,
      height: 800,
      width: 710,
      modal: true,
      buttons: {
        'Cancel': function() {
          dialog.dialog( "close" );
        },
        'Save':function(){
            save();
        }
      },
      close: function() {
        dialog.dialog( "close" ); 
      }
    });
    
    /**
     * dialog image options
     * 
     */
    var dialog_image = $( "#dialog_image" ).dialog({
      autoOpen: false,
      height: 550,
      width: 635,
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
  });

</script>

<div id="dialog" title="Edit article">
</div>
<div id="dialog_image" title="Edit image">
</div>

