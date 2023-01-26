// $(document).ready(function () {
//     $(".btn-success").click(function () {
//         var html = $(".clone").html();
//         $(".increment").after(html);
//     });

//     $("body").on("click", ".btn-danger", function () {
//         $(this).parents(".control-group").remove();
//     });
// });

$(document).ready(function () {
    $("#add").click(function () {
        var html = $("#images").html();
        $("#images").after(html);
    });

    $("#addVideo").click(function () {
        var html = $("#videos").html();
        $("#videos").after(html);
    });

    $("#addFile").click(function () {
        var html = $("#files").html();
        $("#files").after(html);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".sidebar .nav-link").forEach(function (element) {
        element.addEventListener("click", function (e) {
            let nextEl = element.nextElementSibling;
            let parentEl = element.parentElement;

            if (nextEl) {
                e.preventDefault();
                let mycollapse = new bootstrap.Collapse(nextEl);

                if (nextEl.classList.contains("show")) {
                    mycollapse.hide();
                } else {
                    mycollapse.show();
                    // find other submenus with class=show
                    var opened_submenu =
                        parentEl.parentElement.querySelector(".submenu.show");
                    // if it exists, then close all of them
                    if (opened_submenu) {
                        new bootstrap.Collapse(opened_submenu);
                    }
                }
            }
        }); // addEventListener
    }); // forEach
});
// DOMContentLoaded  end
