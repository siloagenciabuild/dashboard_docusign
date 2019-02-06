<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <h2 style="margin-bottom: 3rem; margin-top: 5rem;">Bem-vindo ao Controle Unimed</h2>
    <div class="card text-center mx-auto">
        <div class="card-header">
            Existem atualmente
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo count($unimedListService->readAll()); ?></h5>
            <p class="card-text">Unimeds cadastradas.</p>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
    <h2>Unimed List</h2>
    <div class="table-responsive" style="height: 490px;">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <?php foreach ($unimedListTable as $unimedTable) { ?>
                        <th style="border-color: #242F4F;"><?php echo strtoupper($unimedTable); ?></th>
                    <?php }; ?>
                    <th style="border-color: #242F4F;">EDIT</th>
                </tr>
            </thead>
            <tbody id="unimedList">
                
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $unimedListService->totalPage(); $i++) { ?>
                <li class="page-item">
                    <a class="page-link" id="page<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="col-8 mt-5 pt-5 mx-auto p-0" id="unimedTable" style="width: 450px; height: 507px;">
        <form action="resource/unimedListResource.php" method="post" id="sendUnimedList">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input style="border-radius: 10px 10px 0px 10px;border: 1px solid ##6c757d;" type="text" class="form-control" name="unimedList[nome]" aria-describedby="emailHelp" placeholder="Enter Nome" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input style="border-radius: 10px 10px 0px 10px; border: 1px solid ##6c757d;"type="email" class="form-control" name="unimedList[email]" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <button style="color: #fff; font-family: unimed; border: none; border-radius: 10px 10px 0px 10px; margin-top: 15px; background-color: #002856;"type="submit" class="btn btn-secondary">Entrar</button>
        </form>
        <div class="text-right hide" id="alertSuccess" style="color: green">
            <strong>Cadastro incluído com sucesso!</strong>
        </div>
    </div>
</div>


<div class="tab-pane fade p-3" id="nav-control" role="tabpanel" aria-labelledby="nav-control-tab">
    <div class="row">
        <form class="seleciona col-12 p-md-0 col-md-8 m-auto" id="sendUnimed">
            <div class="form-group" id="unimedListReadAll">
                
            </div>
        </form>
    </div>
    <form action="resource/unimedResource.php" method="post" id="sendUnimedForm">
        <div id="resultUnimed">

        </div>
    </form>
</div>

<!-- Modal de exclusão -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tem certeza?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-footer">
            <form action="resource/unimedResource.php" method="POST" id="unimedFormDelete">
                <input class="hide" id="formName" name="unimedFormDelete[nome]" readonly>
                <input class="hide" id="formId" name="unimedFormDelete[id]" readonly>
                <input class="hide" id="unimedChoose" readonly>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" id="modalSend" class="btn btn-success">Excluir</button>
            </form>
        </div>
    </div>
</div>