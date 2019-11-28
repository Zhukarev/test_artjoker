<?php if (count($comment) > 0) { ?>
    <?php foreach ($comment as $item) { ?>
        <div class="review">
            <div class="row">
                <!--not work col-md-offset-*-->
                <div class="col-md-2 col-lg-2" id="author"><b><i><?php echo $item['fio']; ?></i></b></div>
            </div>
            <div class="row" id="rowEmail">
                <div class="col-md-2 col-lg-2" id="email"><img src="<?php echo 'images/' . $item['email']; ?>" id="image"></div>
            </div>
            <div class="row" id="rowRegion">
                <div class="col-md-10 col-lg-10" id="coment"><?php echo $item['id_region']; ?></div>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-10"></div>
                <div class="col-md-2 col-lg-2" id="date"><?php echo $item['id_city']; ?></div>
            </div>
        </div>
        <br/>

    <?php } ?>

<?php } else {
    echo 'Оставьте отзыв и Вас настигнет счастье';
} ?>

<p></p>