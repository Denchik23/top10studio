<?php include(TemplatePrefix.'header'.TemplatePostfix);?>

<div class="container" role="main">

    <div class="page-header">
        <h2>Коллицество записей в базе  <span class="badge"><?=$CountClients?></span></h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Домашняя страница</th>
                    <th>Дата создания</th>
                    <th colspan="2" class="Actions">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rsClients as $item):?>
                    <tr>
                        <td><?=$item['id']?></td>
                        <td><?=$item['name']?></td>
                        <td><?=$item['email']?></td>
                        <td><?=$item['homepage']?></td>
                        <td><?=$item['date']?></td>
                        <td><a id="showRecord_<?=$item['id']?>" class="btn btn-primary btn-xs" href="#" onclick="showRecordAj(<?=$item['id']?>); return false;"><span class="glyphicon glyphicon-fullscreen"></span> Просм</a></td>
                        <td><a class="btn btn-primary btn-xs" href="/del/<?=$item['id']?>/"><span class="glyphicon glyphicon-trash"></span> Удл</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php if ($pagination['num_pages'] > 1):?>
            <div class="text-center">
                <ul class="pagination">
                    <?php if ($pagination['cur_page'] == 1) :?>
                        <li class="disabled"><span>«</span></li>
                    <?php else: ?>
                        <li><a href="/?page=<?=$pagination['cur_page']-1?>" rel="prev">«</a></li>
                    <?php endif; ?>
                    <?php for ($page=1; $page <= $pagination['num_pages']; $page++) :?>
                        <?php if ($page == $pagination['cur_page']):?>
                            <li class="active"><span><?=$page?></span></li>
                        <?php else: ?>
                            <li><a href="/?page=<?=$page?>"><?=$page?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if($pagination['cur_page'] == $pagination['num_pages']):?>
                        <li class="disabled"><span>»</span></li>
                    <?php else: ?>
                        <li><a href="/?page=<?=$pagination['cur_page']+1?>" rel="next">»</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div id="myModal" class="modal fade bs-example-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Просмотр записи</h4>
                </div>
                <div id="modalRecord" class="modal-body">
                    Содержимое модального окна...
                </div>
                <!-- Футер модального окна -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->

<?php include(TemplatePrefix.'footer'.TemplatePostfix);?>