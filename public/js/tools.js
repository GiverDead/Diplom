/**
 * Created by andri on 17.03.2017.
 */
$(function () {
    $(".object_panel").click(function () {
        var form = $(this).attr("data-form");
        if (form != undefined) {
            $.get(form, function (data) {
                var form = data;
                $("#newObject .modal-body").html("");
                $("#newObject .modal-body").append(form);
                $("#newObject").modal("show");
                console.log(form);
            });
        }
    })
})