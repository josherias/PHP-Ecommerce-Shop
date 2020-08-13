<!-- Header.php file -->
<?php
include('./Header.php');

?>
<!----x- Header.php file --x-->

<!---- banner ----->
<?php
include('./template/_banner.php');
?>
<!--x-- banner --x--->


<!---- New Products ---->
<?php
include('./template/_new_products.php');
?>
<!--x-- New Products --x-->

<!-- colections -->
<?php
include('./template/_collections.php');
?>
<!-- colections -->

<!----- banner Adds ----->
<?php
include('./template/_banner_adds.php');
?>
<!--x--- banner Adds --x--->

<!---- Products ---->
<?php
include('./template/_products.php');
?>
<!--x-- Products --x-->

<!-- footer -->
<?php
include('./Footer.php');
?>

<script>
    $(document).ready(function() {
        ///add product to cart 
        $("#add_to_cart_new").on("click", function(e) {
            e.preventDefault();
            var id = $('#input_hidden').attr('data-id');
            console.log(id);
            $.ajax({
                url: "addToCart.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function() {
                    console.log("item added to cart succsesfully");

                }
            })
        })

    });
</script>