<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/food_carousel.php';
?>
<section class="multi-select">
    <select class="select" multiple data-mdb-filter="true" id="type_select">
        <?php foreach ($data[1] as $Key=>$values){?>
            <option value="<?php $values['restaurant_type']?>">
                <?php echo $values['restaurant_type']?>
            </option>
        <?php }?>
    </select>
</section>


<?php
require APPROOT . '/views/includes/restaurantCards.php';
?>

<?php
require APPROOT . '/views/includes/footer.php';
?>
