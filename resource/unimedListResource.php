<?php
    require_once __DIR__ . '/../services/unimedListService.php';

    $unimedListService = new unimedListService();
    $unimedListTable = $unimedListService->readTable();
    $unimedList = $unimedListService->readByPage(0);

    if (!empty($_POST['unimedList'])) {
        $data = $_POST['unimedList'];
        $unimedListService->insert($data);
    }

    if (!empty($_POST['unimedUrl'])) {
        $data = $_POST['unimedUrl'];
        $unimedListService->delete($data);
        $_GET['page'] = 1;
    }

    if (!empty($_POST['unimedListUrl'])) {
        $unimedListUrl = $_POST['unimedListUrl'];
        $unimedListService->delete($unimedListUrl);
    }

    if (!empty($_GET['page'])) {
        $unimedList = $unimedListService->readByPage($_GET['page']);
        if ($unimedList == 0) {
            echo '<tr class="border-color: black;">
            <td style="border-color: #242F4F;" colspan="4">Nenhum registro adicionado</td>';
        } else {
            foreach ($unimedList as $unimed) {
                echo '<tr class="border-color: black;">
                    <td style="border-color: rgb(240, 174, 76);">' . $unimed->getNome()  . '</td>
                    <td style="border-color: rgb(240, 174, 76);">' . $unimed->getEmail() . '</td>
                    <td style="border-color: rgb(240, 174, 76);">' . $unimed->getUrl() . '</td>
                    <td style="border-color: #242F4F;"><a href="" data-toggle="modal" data-target="#exampleModalCenter" onclick="deleteUnimedFunction(' . $unimed->getUrl() . ')"><img src="dist/images/delete-icon.png" width="20px"></a></td>
                </tr>';
            };
        }
    }

    if (!empty($_GET['unimedListReadAll'])) {
        echo '<select class="form-control col-md-12" id="select1" name="id" onchange="triggerSendUnimed()">
                <option value="null" selected disabled>Selecione a Unimed...</option>';
        foreach ($unimedListService->readAll() as $unimedList) {
            echo '
                <option value=' . $unimedList->getUrl() . ' class="unimedUrl">' . $unimedList->getNome() . ' </option>';
        };
        echo '</select>';
    }