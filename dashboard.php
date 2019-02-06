<?php 
    include('session.php');
    include('headerTemplate.php');
    require_once __DIR__ . '/services/unimedListService.php';
    require_once __DIR__ . '/services/unimedService.php';

    $unimedListService = new unimedListService();
    $unimedService = new unimedService();
    $unimedListTable = $unimedListService->readTable();
    $totalPages = $unimedListService->totalPage();
?>

<?php 
    if ($_SESSION['login_level'] == 1) {
        include('nivel_acesso/dashboard1.php');
    } else {
        include('nivel_acesso/dashboard2.php');
    };
?>

<?php include('footerTemplate.php'); ?>
<script>

    function unimedListReadAll() {
        $.get("resource/unimedListResource.php", { unimedListReadAll : "1" }, function(data) {
            $('#unimedListReadAll').html(data)
        });
    }

    unimedListReadAll()

    function testInput(event) {
        var value = String.fromCharCode(event.which);
        var pattern = new RegExp(/[a-zåäö]/i);
        return pattern.test(value);
    }

    var frm = $('#sendUnimedList');
    frm.submit(function(ev) {
        var unimedList = $('#sendUnimedList').serializeArray();
        ev.preventDefault();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: unimedList,
            success: function(data) {
                unimedListReadAll()
                console.log(data)
                $('#alertSuccess').removeClass("hide")
                setTimeout(function(){
                    $('#alertSuccess').addClass("hide");
                }, 1000);
            }
        })
        $(this).each (function(){
            this.reset();
        });
    })

    var frm2 = $('#sendUnimedForm');
    $('#sendUnimedForm').submit(function(ev) {
        var unimedForm = $('#sendUnimedForm').serializeArray();
        ev.preventDefault();
        $.ajax({
            type: frm2.attr('method'),
            url: frm2.attr('action'),
            data: unimedForm,
            success: function(data) {
                if (data == "BAD_REQUEST") {
                    $('#formDanger').removeClass("hide")
                    setTimeout(function(){
                        $('#formDanger').addClass("hide");
                    }, 1500);
                } else {
                    $('#resultUnimed').html(data)
                    var totalCount = $('#formTotal').text()
                    $('#formSuccess').removeClass("hide")
                    setTimeout(function(){
                        $('#formSuccess').addClass("hide");
                    }, 1500);
                }
            }
        })
        $(this).each (function(){
            this.reset();
        });
    })

    function deleteFunction(number) {
        $('#unimedChoose').val(1)
        if (number == 1) {
            $('#formName').val($('#form1').val())
            $('#formId').val($('#formSendId').text())
        } else if (number == 2) {
            $('#formName').val($('#form2').val())
            $('#formId').val($('#formSendId').text())
        } else if (number == 3) {
            $('#formName').val($('#form3').val())
            $('#formId').val($('#formSendId').text())
        } else if (number == 4) {
            $('#formName').val($('#form4').val())
            $('#formId').val($('#formSendId').text())
        } else if (number == 5) {
            $('#formName').val($('#form5').val())
            $('#formId').val($('#formSendId').text())
        } else if (number == 6) {
            $('#formName').val($('#form6').val())
            $('#formId').val($('#formSendId').text())
        }
    }

    function deleteUnimedFunction(url) {
        $('#formId').val(url)
        $('#unimedChoose').val(2)
    }

    var frm3 = $('#unimedFormDelete');
    frm3.submit(function(ev) {
        ev.preventDefault()
        if ($('#unimedChoose').val() == 1) {
            var unimedList = $('#unimedFormDelete').serializeArray();
            $.ajax({
                type: frm3.attr('method'),
                url: frm3.attr('action'),
                data: unimedList,
                success: function(data) {
                    unimedListReadAll()
                    $('#unimedList').html(data)
                    $('#exampleModalCenter').modal('hide');
                    $('#resultUnimed').html(data)
                }
            })
        } else {
            var url = $('#formId').val()
            $.ajax({
                type: 'POST',
                url: 'resource/unimedListResource.php',
                data: { unimedListUrl : url },
                success: function(data) {
                    $('#exampleModalCenter').modal('hide');
                    $('#unimedList').html(data)
                }
            })
        }
    })
    
    $.get("resource/unimedListResource.php", { page : "1" }, function(data) {
        $('#unimedList').html(data)
    });

    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
        $('#page<?php echo $i; ?>').click(function(ev) {
            ev.preventDefault()
            var page = $('#page<?php echo $i; ?>').text()
            $.get("resource/unimedListResource.php", { page : page }, function(data) {
                $('#unimedList').html(data)
            });
        })
    <?php }; ?>

    function triggerSendUnimed() {
        $('#sendUnimed').submit()
    }

    $('#sendUnimed').submit(function(ev) {
        ev.preventDefault()
        var url = $('#select1').val();
        $.get("resource/unimedResource.php", { unimedUrl : url }, function(data) {
            $('#resultUnimed').html(data)
        });
    })
</script>