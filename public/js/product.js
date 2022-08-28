jQuery(document).ready(function ($) {
    jQuery("#btn-add").click(function () {
        jQuery("#btn-save").val("add");
        jQuery("#myForm").trigger("reset");
        jQuery("#formModal").modal("show");
    });
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        e.preventDefault();
        let formData = {
            title: jQuery("#title").val(),
            imageUrl: jQuery("#imageUrl").val(),
            price: jQuery("#price").val(),
            quantity: jQuery("#quantity").val(),
        };
        let state = jQuery("#btn-save").val();
        let type = "POST";
        let product_id = jQuery("#product_id").val();
        let ajaxurl = "product";

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: "json",
            success: function (data) {
                let product = `
                <tr id=product${data.id}>
                    <td>${data.title}</td>
                    <td>
                        <img src=${data.imageUrl} width=50px/>
                    </td>
                    <td>${data.price}</td>
                    <td>${data.quantity}</td>
                    <td>    
                        <button id="add_btn" product_id=${data.id} class="btn add btn-success fs-5 mx-2">+</button>
                        <button id="remove_btn" product_id=${data.id} class="btn remove btn-danger mx-2 fs-5">-</button>
                    </td>

                </tr>`;

                if (state == "add") {
                    jQuery("#products-list").append(product);
                } else {
                    jQuery("#product" + product_id).replaceWith(product);
                }
                jQuery("#myForm").trigger("reset");
                jQuery("#formModal").modal("hide");
                console.log(state);
            },
            error: function (data) {
                console.log(data);
            },
        });
    });
});
$(document).on("click", ".add", function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let product_id = $(this).attr("product_id");
    $.ajax({
        type: "post",
        url: `product/${product_id}`,
        data: "",
        dataType: "json",
        success: function (data) {
            let product = `
                <tr id=product${data.id}>
                    <td>${data.title}</td>
                    <td>
                        <img src=${data.imageUrl} width=50px/>
                    </td>
                    <td>${data.price}</td>
                    <td>${data.quantity}</td>
                    <td>    
                        <button id="add_btn" product_id=${data.id} class="btn add btn-success fs-5 mx-2">+</button>
                        <button id="remove_btn" product_id=${data.id} class="btn remove btn-danger mx-2 fs-5">-</button>
                    </td>

                </tr>`;

            jQuery("#product" + product_id).replaceWith(product);
        },
        error: function (data) {
            console.log(data);
        },
    });
});

$(document).on("click", ".remove", function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let product_id = $(this).attr("product_id");
    $.ajax({
        type: "put",
        url: `product/${product_id}`,
        data: "",
        dataType: "json",
        success: function (data) {
            let product;
            console.log(data);
            if (data.message) {
                $(`#product${data.id}`).remove();
            } else {
                product = `
                <tr id=product${data.id}>
                    <td>${data.title}</td>
                    <td>
                        <img src=${data.imageUrl} width=50px/>
                    </td>
                    <td>${data.price}</td>
                    <td>${data.quantity}</td>
                    <td>    
                        <button id="add_btn" product_id=${data.id} class="btn add btn-success fs-5 mx-2">+</button>
                        <button id="remove_btn" product_id=${data.id} class="btn remove btn-danger mx-2 fs-5">-</button>
                    </td>
                </tr>`;
                jQuery("#product" + product_id).replaceWith(product);
            }

        },
        error: function (data) {
            console.log(data);
        },
    });
});
