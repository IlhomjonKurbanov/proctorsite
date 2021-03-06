
<h1><?= $titleonpage ?></h1>




<?php foreach ($content as $row): ?>

    <?php if (isset($edit)) { ?>
        <a style='float:right;' href="<?= base_url() ?>admin/create_news"><img width="16px" height="16px" alt="edit" src="<?= base_url() ?>images/icons/social/add_16.png"></a>
        <a  style='float:right;' href='<?= base_url() ?>admin/edit/<?= $row['menu_title'] ?>'><img width='16px' height='16px' alt='edit' src='<?= base_url() ?>images/icons/social/edit_16.png'></a>
        <div style="clear:both"></div>
        <?php
        foreach ($allnews as $row):

            if ($row['published'] < 1) {
                echo "<div class='unpublished' id='unpublished_" . $row['news_id'] . "'>";
                echo $row['news_title'] . " (not published)";
                echo "<span style='float:right' >";
                echo "<a href='" . base_url() . "admin/editnews/" . $row['news_id'] . "'>EDIT</a>";
                echo "| <span class='spanlink' onclick='deleteBlog(" . $row['news_id'] . ")'>delete</span>";
                echo "</span>";
                echo "</div>";
            }


        endforeach;
        ?>



    <?php } ?>




<?php endforeach; ?>

<p>
</p>
<?php
//list news here
foreach ($news as $news):
    ?>
    <?php
    $old_date = strtotime($news['date_added']);
    $new_date = date('l jS \of F Y', $old_date);
    $day = date('j', $old_date);
    $month = date('M', $old_date);
    ?>
    <div class="news_date"><?= $day ?><br/>
    <?= $month ?>
    </div>
    <div class="blogcontainer">
        <h2>
            <a href="<?= base_url() ?>blog/post/<?= $news['news_id'] ?>">
    <?= $news['news_title']; ?></a> </h2>


        <?php
        if (isset($edit)) {
            echo "  <a style='float:right;' href='" . base_url() . "admin/editnews/" . $news['news_id'] . "'><img width='16px' height='16px' alt='edit' src='" . base_url() . "images/icons/social/edit_16.png'></a>";
        }
        ?>





        <div style="clear:both"></div>
        <br/>
        <?php
//adds a readmore by cutting all text after the $needle
        $needle = "[readmore]";
        $haystack = $news['news_content'];
        $pos = strpos($haystack, $needle);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
        if ($pos === false) {
            //The string '$needle' was not found in the string $haystack
            $content = $haystack;
            $readmore = FALSE;
        } else {
            //The string $needle' was found in the string $haystack
            $content = substr(strrev(strstr(strrev($haystack), strrev($needle))), 0, -strlen($needle));
            
            $readmore = TRUE;
        }
        ?>
        <?php if ($news['main_image'] != NULL) { ?>
            <img src="https://s3-eu-west-1.amazonaws.com/lease-desk-blog/<?= $news['main_image'] ?>" style="float:left; padding:10px 10px 10px 0;" width="350px">
        <?php } ?>
    <?= $content ?>


       

        <?php if ($readmore) { ?>
            <a href="<?= base_url() ?>blog/post/<?= $news['news_id'] ?>">Read More</a><br/>
    <?php } ?>

        <em>Added by <?= $news['added_by']; ?></em><br/>
         <div  id="fb-root"></div>
        <div class="social-single">


            <div id="twitterbutton">
                <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?= base_url() ?>blog/post/<?= $news['news_id'] ?>" data-count="horizontal" data-via="leasedeskdotcom">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
            </div>



            <!-- Place this tag where you want the +1 button to render -->

            <div  style="float:left;" class="g-plusone" data-size="medium" data-annotation="none" data-href="<?= base_url() ?>blog/post/<?= $news['news_id'] ?>"></div>
            <div id="likebutton">
                <fb:like href="<?= base_url() ?>blog/post/<?= $news['news_id'] ?>" send="false" layout="button_count" width="0" height="20" show_faces="false" font=""></fb:like>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <hr/>

<?php endforeach; ?>

<script type="text/javascript">
    window.___gcfg = {
        lang: 'en-GB'
    };
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
</script>
<script src="http://connect.facebook.net/en_US/all.js#appId=195766550471199&amp;xfbml=1"></script>

<?php if (isset($allnews)) { ?>


    <?php
    $count = 0;
    $perpage = 5;
    $totalcount = 0;
    $page = 0;
    $currentpage = $this->uri->segment(3);
    ?>

    <?php if (($currentpage) > 0) { ?> 
        <div class="paginater" style="float:right;"><a href="<?= base_url() ?>blog/item/<?= $currentpage - $perpage ?>">Newer Posts &raquo;</a></div>
    <?php } ?>

    <?php foreach ($allnews as $row): ?>

        <?php
        $totalcount = $totalcount + 1;
        $count = $count + 1;
        ?>

        <?php if ($count == $perpage) { ?>
            <?php $page = $page + 1; ?>
<!--            <div class="paginater" <?php if ($currentpage == ($totalcount - $count)) { ?> style="background:#353e43;"<?php } ?>><a href="<?= base_url() ?>blog/item/<?= $totalcount - $count ?>"><?= $page ?></a></div>-->
            <?php $count = 0; ?>
        <?php } ?>

    <?php endforeach; ?>
    <?php if ($count > 0) { ?>
        <?php $page = $page + 1; ?>
        <?php if (($currentpage + $perpage) < $totalcount) { ?> 
            <div class="paginater" style="float:left;"><a href="<?= base_url() ?>blog/item/<?= $currentpage + $perpage ?>">&laquo; Older Posts</a></div>
        <?php } ?>
        <?php $count = 0; ?>
    <?php } ?>
<?php } ?>
