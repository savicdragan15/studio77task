<div class="container">

        <!-- /.row -->

       
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $article->article_title ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?=_WEB_PATH?>">Article</a>
                    </li>
                    <li class="active"><?= $article->article_title ?></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">

                <!-- Blog Post -->

                <hr>

                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Posted on <?= $article->article_date_time?></p>

                <hr>

                <!-- Preview Image -->
                <img alt="" src="<?=_WEB_PATH?>views/img/<?=$image->image_name?>" class="img-responsive">

                <hr>

                <!-- Post Content -->
                <h3><?= $article->article_title ?></h3>
                <p class="lead"><?= $article->article_description ?></p>
    
                <hr>


            </div>
        </div>