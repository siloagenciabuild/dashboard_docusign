<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <h2>Unimed List</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <?php foreach ($unimedListTable as $unimedTable) { ?>
                        <th style="border-color: rgb(240, 174, 76);"><?php echo strtoupper($unimedTable); ?></th>
                    <?php }; ?>
                    <th style="border-color: rgb(240, 174, 76);">EDIT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($unimedList as $unimed) { ?>
                    <tr class="border-color: black;">
                        <td style="border-color: rgb(240, 174, 76);"><?php echo $unimed->getNome(); ?></td>
                        <td style="border-color: rgb(240, 174, 76);"><?php echo $unimed->getEmail(); ?></td>
                        <td style="border-color: rgb(240, 174, 76);"><?php echo $unimed->getUrl(); ?></td>
                        <td style="border-color: rgb(240, 174, 76);"><a href="#"><img src="dist/images/delete-icon.png" width="20px"></a></td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="col-8 mt-5 pt-5 mx-auto p-0" id="unimedTable" style="width: 450px; height: 507px;">
        <form action="resourceRequest.php" method="post" id="sendForm">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" name="unimedList[nome]" aria-describedby="emailHelp" placeholder="Enter Nome" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input type="email" class="form-control" name="unimedList[email]" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
        <div class="text-right hide" id="alertSuccess" style="color: green">
            <strong>Cadastro incluído com sucesso!</strong>
        </div>
    </div>
</div>