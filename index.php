<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>antspider</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">

</head>

<body >
    <br>
    <h4 style="text-align: center;">antspider</h4>
    <br>
    <div class="container border">
        <br />
        <!--แบฟรอม-->
        <div class="container ">

            <form class="row">
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="กรุณากรอก ID " id="foodid" style="text-align: center;">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="กรุณากรอกชื่ออาหาร" id="foodname" style="text-align: center;">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="กรุณากรอกราคาอาหาร" id="foodprice" style="text-align: center;">
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary " id='btnAdd'><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                      </svg>  Add</button>
                </div>
    </form>
        </div>
        <!--ฟอม-->
        <div class="container ">
            <table id="tblAll" class="table table-striped" style="margin-top:23px">
                <thead>
                    <tr>
                        <th>ID อาหาร :</th>
                        <th>ชื่ออาหาร :</th>
                        <th>ราคา :</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <br />
        </div>
    </div>
</body>


<script>
    $(function () {
        $('#btnAdd').on('click', function () {
            var foodid, foodname, foodprice;
            foodid = $("#foodid").val();
            foodname = $("#foodname").val();
            foodprice = $("#foodprice").val();
            var edit = "<a class='edit' href='JavaScript:void(1);' >Edit</a>";
            var del = "<a class='delete' href='JavaScript:void(1);'>Delete</a>";
            if (foodid == "" || foodname == "" || foodprice == " ") {
                alert("กรุณากรอก");
            } else {
                var table = "<tr><td>" + foodid + "</td><td>" + foodname + "</td><td>" + foodprice + "</td><td>" + edit + "</td><td>" + del + "</td></tr>";
                $("#tblAll").append(table);
            }
            foodid = $("#foodid").val("");
            foodname = $("#foodname").val("");
            foodprice = $("#foodprice").val("");
            Clear();
        });
    });

    $('#btnUpdate').on('click', function () {
        var foodid, foodname, foodprice;
        foodid = $("#foodid").val();
        foodname = $("#foodname").val();
        foodprice = $("#foodprice").val();
        $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(0).html(foodid);
        $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(1).html(foodname);
        $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(2).html(foodprice);
        $('#btnAdd').show();
        $('#btnUpdate').hide();
        Clear();
    });
    $("#tblAll").on("click", ".delete", function (e) {
        if (confirm("คุณต้องการลบใช่หรือไม่")) {
            $(this).closest('tr').remove();
        } else {
            e.preventDefault();
        }
    });
    $('#btndelete').on('click', function () {
        Clear();
    });


    $("#tblAll").on("click", ".edit", function (e) {
        var row = $(this).closest('tr');
        $('#hfRowIndex').val($(row).index());
        var td = $(row).find("td");
        $('#foodname').val($(td).eq(1).html());
        $('#foodid').val($(td).eq(0).html());
        $('#foodprice').val($(td).eq(2).html());

        $('#btnAdd').show();
        $('#btnUpdate').show();
    });

    function Clear() {

        $("#foodname").val("");
        $("#foodid").val("");
        $("#foodprice").val("");

    }
</script>


</html>
