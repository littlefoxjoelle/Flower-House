<script type="text/javascript">
$(document).ready(function() {
    $('#blocktrackbar').trackbar({
    onMove: function() {
        document.getElementById("start-price").value = this.leftValue;
        document.getElementById("end-price").value = this.rightValue;
    },
    width : 200,
    leftLimit : 10,
    leftValue : <?php 

        if ((int)$_GET["start_price"] >=10 AND (int)$_GET["start_price"] <=300)
        {
            echo (int)$_GET["start_price"];
        }
        else{
            echo "10";
        }

    ?> ,
    rightLimit : 300,
    rightValue : <?php 

if ((int)$_GET["end_price"] >=10 AND (int)$_GET["end_price"] <=300)
{
    echo (int)$_GET["end_price"];
}
else{
    echo "300";
}

?> ,
    roundUp : 5
});
});
</script>


<div class="block-parametr">
<p class="header-title">Поиск по параметрам</p>
<p class="title-filter">Стоимость</p>

<form method="GET" action="search_filter.php">

<div class="block-input-price">
    <ul>
        <li>от</li>
        <li><input type="number" min="1" step="1" id="start-price" name="start_price" value="10"> руб</li>
        <li>до</li>
        <li><input type="number" min="1" step="1" class="raz" id="end-price" name="end_price" value="300"> руб</li>
    </ul>
</div>
<br>
<div id="blocktrackbar"></div>
<input type="submit" name="submit" id="button-param-search" value="Найти">

</form>
</div>