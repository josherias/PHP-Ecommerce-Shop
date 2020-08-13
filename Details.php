<!-- Header.php file -->
<?php
include('./Header.php');

?>
<!----x- Header.php file --x-->

<!-- --------initial detais sectio-------- -->
<?php
include('./template/_details.php');
?>
<!-- ---x-----initial detais sectio------x-- -->

<!-- footer file -->
<?php
include('./Footer.php');
?>

<script>
    $(document).ready(function(e) {
        ///add product to cart 
        $("#add_to_cart_btn").on("click", function(e) {
            e.preventDefault();
            console.log("Add to cart has been clicked");
            var id = $(this).attr('data-id');
            console.log(id);
            $.ajax({
                url: "addToCart.php",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    let newdata = '';
                    data.map((data) => {
                        newdata = data;
                        return newdata;
                    });
                    console.log(newdata);

                }
            })
        })

    });
</script>