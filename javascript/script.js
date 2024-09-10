$(document).ready(function(){
    console.log("Document ready");
    $("#form").submit(function (event) {
        event.preventDefault(); // prevent from executing
        const form = $(this);
        $.ajax({
            type: form.attr('method'),
            url: "../action/login.php",
            data: form.serialize(),
            success: function (data) {
                $("#button")
                .html('<span class="loading loading-spinner loading-xs"></span> Signing in...')
                .removeClass("bg-green-600/80")
                .addClass("bg-default")
                .removeClass("hover:bg-green-700/80")
                .attr("disabled", true);
    
                if (data.status !== 200) {
                    setTimeout(function(){
                        Toastify({
                            text: data.message,
                            duration: 5000,
                            close: false,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#2A323C",
                            stopOnFocus: true,
                        }).showToast();
                        $("#button")
                        .html('Sign in')
                        .addClass("hover:bg-green-700/80")
                        .addClass("bg-green-600/80")
                        .removeClass("bg-default")
                        .attr("disabled", false);
                    }, 1000)
                } else {
                    setTimeout(function () {
                        window.location.href = "../pages/home.php";
                    }, 5000);
                }
    
            }, error: function (data) {
                console.error("Something went wrong", data);
            }
        })
    
    });
    
    $(document).on("submit", "#form-product", function (event) {
        event.preventDefault();
        const form = $(this);
        $.ajax({
            method: $(this).attr("method"),
            url: "../action/create-product.php",
            data: form.serialize(),
            success: function (data) {
               $("#product-table").load(location.href + "#product-table");
            },error : function (){
                console.error("Error creating product");
            }
        })

    });

    $(document).on("click", "#delete-product" , function(){
        $.ajax({
            method: "POST",
            url: "../action/delete-product.php",
            data: {product_id: $(this).data("id")},
            success: function(data){
                const json = $.parseJSON(data);
                alert(json.message);
                $("#product-table").load(location.href + "#product-table");

            },error: function (error){
                console.error(error);
            }
        })
    })
    
})