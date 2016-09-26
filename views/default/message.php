<?php include(TemplatePrefix.'header'.TemplatePostfix);?>

<div class="container" role="main">

    <div class="page-header">
        <h2><?=$pagetitle;?></h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($error)):?>
                <div class="alert alert-danger">
                    <p><?=$error;?></p>
                </div>
            <?php endif; ?>
            <?php if (isset($success)):?>
                <div class="alert alert-success">
                    <p><?=$success;?></p>
                </div>
            <?php endif; ?>
            <p class="text-center"><a href="/" class="btn btn-default">Назад к списку записей</a></p>
        </div>
    </div>

</div> <!-- /container -->

<?php include(TemplatePrefix.'header'.TemplatePostfix);?>