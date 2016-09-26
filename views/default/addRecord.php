<?php include(TemplatePrefix.'header'.TemplatePostfix);?>

<div class="container" role="main">

    <div class="page-header">
        <h2>Добавление новой записи</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <?php if (isset($FormError)):?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($FormError as $item):?>
                        <li><?=$item;?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
            <form class="form-horizontal" role="form" method="post" id="formAddRecords">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Ф.И.О" name="name" value="<?php if (isset($Formdata['name'])) echo $Formdata['name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="<?php if (isset($Formdata['email'])) echo $Formdata['email'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="homepage" class="col-sm-2 control-label">Домашняя страница</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="homepage" placeholder="URL-адрес" name="homepage" value="<?php if (isset($Formdata['homepage'])) echo $Formdata['homepage'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Текст</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="text" cols="50" rows="10" id="text">
                            <?php if (isset($Formdata['text'])) echo $Formdata['text'];?>
                        </textarea>
                        <script type="text/javascript">
                            $(window).load(function() {
                                CKEDITOR.replace('text');
                            })
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Картинка капчи</label>
                    <div class="col-sm-10">
                        <img src="../captcha/captcha.php" alt="Капча">
                    </div>
                </div>
                <div class="form-group">
                    <label for="codeCap" class="col-sm-2 control-label">Введите код с картинки</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="codeCap" placeholder="Цифры" name="codeCap" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Сохранить</button>
                        <a href="/" class="btn btn-default">Отмена</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div> <!-- /container -->

<?php include(TemplatePrefix.'header'.TemplatePostfix);?>