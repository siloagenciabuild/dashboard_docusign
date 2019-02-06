<?php
    require_once __DIR__ . '/../services/unimedService.php';

    $unimedService = new unimedService();

    if (!empty($_POST['unimedForm'])) {
        $data = $_POST['unimedForm'];
        $response = $unimedService->createColumn($data);
        if ($response != "BAD_REQUEST") {
            $_GET['unimedUrl'] = $data['id'];
        } else {
            echo $response;
        }
    }

    if (!empty($_POST['unimedFormDelete'])) {
        $data = $_POST['unimedFormDelete'];
        $unimedService->delete($data);
        $_GET['unimedUrl'] = $data['id'];
    }

    if (!empty($_GET['unimedUrl'])) {
        $url = (string)$_GET['unimedUrl'];
        $data = $unimedService->readTable($_GET['unimedUrl']);
        if ($data == "ERROR 404") {
            echo ' ';
        } else {
            if (count($data) >= 6) {
                $count = 1;
                echo '
                    <div class="row w-100" style="height: 150px;">
                        <div class="col-5 mx-auto">
                            <div class="alert alert-danger text-center" role="alert">
                                Numero máximo de colunas
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 pt-md-5">
                        <div class="col-12">
                            <div class="row w-75 mx-auto">
                                <span class="hide" id="formSendId">' . $url . '</span>
                                <span class="hide" id="formTotal">' . count($unimedService->readTable($url)) . '</span>';
                                
                    foreach ($data as $data) {
                        echo '<div class="col-12 col-md-6 mb-2 mb-md-3 align-middle">';
                        echo '<input class="form-control col-10 col-md-11" id="form' . $count . '" value=' . ucfirst($data) . ' style="display: inline-block;" disabled>';
                        echo '<a href="" data-toggle="modal" data-target="#exampleModalCenter" onclick="deleteFunction(' . $count . ')"><img src="dist/images/delete-icon.png" width="20px"></a>';
                        echo '</div>';
                        $count++;
                    };
                echo '
                            </div>
                        </div>
                    </div>';
            } else {
                $count = 1;
                echo '
                    <div class="row w-100 mb-md-5" style="height: 100px;">
                        <div class="col-12 pt-2">
                            <div class="input-group">
                                <input style="border-radius: 10px 0px 0px 10px; type="text" class="form-control col-12 col-md-5" name="unimedForm[nome]" placeholder="Nome do Campo" aria-describedby="buttonSendForm" onkeypress="return testInput(event)" required>
                                <div class="input-group-prepend">
                                    <button style="border-radius: 0px 10px 0px 0px;" class="btn btn-outline-secondary" id="buttonSendForm">Send</button>
                                </div>
                            </div>
                            <input type="text" class="form-control hide" name="unimedForm[id]" value="' . $url . '" readonly>
                            <div class="alert alert-success col-10 col-md-4 hide" id="formSuccess" role="alert">
                                Dado inserido com sucesso!
                            </div>
                            <div class="alert alert-danger col-10 col-md-4 hide" id="formDanger" role="alert">
                                Nome de coluna já existe!
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 pt-md-5">
                        <div class="col-12">
                            <div class="row w-75 mx-auto">
                                <span class="hide" id="formSendId">' . $url . '</span>
                                <span class="hide" id="formTotal">' . count($unimedService->readTable($url)) . '</span>';
                                
                    foreach ($data as $data) {
                        echo '<div class="col-12 col-md-6 mb-2 mb-md-3 align-middle">';
                        echo '<input class="form-control col-10 col-md-11" id="form' . $count . '" value=' . ucfirst($data) . ' style="display: inline-block;" disabled>';
                        echo '<a href="" data-toggle="modal" data-target="#exampleModalCenter" onclick="deleteFunction(' . $count . ')"><img src="dist/images/delete-icon.png" width="20px"></a>';
                        echo '</div>';
                        $count++;
                    };
                echo '
                            </div>
                        </div>
                    </div>';
            }
        }
    }