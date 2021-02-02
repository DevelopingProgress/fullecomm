$(document).ready(function () {
    TableOrder = $("#tableorders").DataTable({
        "columnDefs":[{
            "targets":  -1,
            "data": null,
            "defaultContent":
                "<div class='text-center'>" +
                    "<div class='btn-group'>" +
                        "<button class='btn btn-primary btnEdit'>Edit</button>" +
                        "<button class='btn btn-danger btnDelete'>Delete</button>" +
                    "</div>" +
                "</div>"
        }]
    });

    $("#newBtn").click(function () {
       $("#formOrders").trigger("reset");
       $(".modal-header").css("background-color", "#2E826E").css("color", "white");
       $(".modal-title").text("New Order");
       $("#modalCRUD").modal("show");
       id = null;
       option = 1;
    });

    var rowtableorder;

    $(document).on("click", ".btnEdit", function () {
        rowtableorder = $(this).closest("tr");
        id = parseInt(rowtableorder.find('td:eq(0)').text());
        order = rowtableorder.find('td:eq(1)').text();
        total = rowtableorder.find('td:eq(2)').text();
        $("#order").val(order);
        $("#total").val(total);
        option = 2;
        $(".modal-header").css("background-color", "#007BFF").css("color", "white");
        $(".modal-title").text("Edit Order");
        $("#modalCRUD").modal("show");
    })

    $(document).on("click", ".btnDelete", function () {
        rowtableorder = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        option = 3;
        $.ajax({url: "../db/crud.php", type: "POST", dataType: "json", data: {option: option, id: id},
            success: function (data) {
                console.log(`success: ${data}`);
                TableOrder.row(rowtableorder.parents('tr')).remove().draw();
            }
        });
    });

    $("#formOrders").submit(function (e) {
        e.preventDefault();
        order = $.trim($("#order").val());
        total = $.trim($("#total").val());
        $.ajax({
            url: "../db/crud.php",
            type: "POST",
            dataType: "json",
            data: {order: order, total: total, id: id, option: option},
            success: function (data) {
                console.log(`success: ${data}`);
                id = data[0].id;
                if(option == 1){
                    TableOrder.row.add([id, order, total]).draw();
                }else{
                    TableOrder.row(rowtableorder).data([id, order, total]).draw();
                }
            }, error(x, y, z) {
                console.log(x);
                console.log(y);
                console.log(z);
            }
        });
        $("#modalCRUD").modal("hide");
    });

})


