<!DOCTYPE html>
<html>
<head>
    <title>Load Excel Sheet in Browser using PHPSpreadsheet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet" />    
</head>
<body>
    <div class="container">
        <br />
        <h3 align="center">Load Excel Sheet in Browser using PHPSpreadsheet</h3>
        <br />
        <div class="table-responsive col-md-10 offset-md-1">
            <span id="message"></span>
            <form method="post" id="load_excel_form" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td width="25%" align="right">Select Excel File</td>
                        <td width="50%"><input type="file" name="select_excel" /></td>
                        <td width="25%"><input type="submit" name="load" class="btn btn-primary" /></td>
                    </tr>
                </table>
            </form>
            <br />
            <div id="excel_area"></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js" integrity="sha512-7yA/d79yIhHPvcrSiB8S/7TyX0OxlccU8F/kuB8mHYjLlF1MInPbEohpoqfz0AILoq5hoD7lELZAYYHbyeEjag==" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#load_excel_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url: "upload.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data)
                    {
                        var s = JSON.parse(data)
                        $('#message').html(s[0].name)
                        $('#excel_area').html(s[0].html);
                        //$('#excel_area').html(data);
                        $('table').css('width','100%');
                        $('#excel_area *').css('font-family','Roboto');
                    }
                })
            });
        });
    </script>
</body>
</html>
