<?php
//The purpose of the doc is to print out a button
//with a link to another page

function placeButton($text, $link)
{
    ?>
    <div class="mybtn">
        <a href="<?php echo $link;?>"><?php echo $text;?></a>
    </div>
    <?php
}
 ?>
