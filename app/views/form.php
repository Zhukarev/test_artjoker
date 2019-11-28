<?php if (count($region) > 0) { ?>
<form enctype="multipart/form-data" method="post" id="inputForm">
    <div class="row" id="input">
        <div class="col-md-1 col-lg-1">Ваше ФИО:</div>
        <div class="col-md-3 col-lg-3"><input type="text" id="authorInput" name="author"/></div>
    </div>
    <div class="row" id="inputEmail">
        <div class="col-md-1 col-lg-1">Ваш email:</div>
        <div class="col-md-4 col-lg-4"><input type="email" id="emailInput" name="email"/></div>
    </div>
    <div class="row" id="inputSelectRegion">
        <select data-placeholder="Выберите область..." class="chosen-select" tabindex="2">
            <option value=""></option>
            <?php 
                foreach ($region as $item) {?>
                   <option value="<?php echo $item['ter_id']?>"><?php echo $item['ter_name']?></option> 

                <?php }
           
            ?>
        </select>
    </div>

    <div class="row" id="inputCity"  style="display: none">

        
    </div>

    <div class="row" id="inputDistrict" style="display: none">
        <input type="text" disabled="disabled" id="inputDistrictInput" style="width: 23%" />
    </div>
    <div class="row" id="input">
        <div class="col-md-4 col-lg-4" id="inputSubmit">
            <button id="inputButton" class="btn-info" > Отправить </button>
        </div>
    </div>

    <div class="row" id="inputChek"  style="display: none">

        
    </div>

    <script src="chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
</form>
<?php } else {
    
    echo 'Прооверьте подключение к БД или наличие в ней данных';
} ?>