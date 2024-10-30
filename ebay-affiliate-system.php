<?php

   if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

   // Get Options 
   
   $optionsx = get_option( 'ebayaff_settings' );
   
   $default_feed = "http://rest.ebay.com/epn/v1/find/item.rss?keyword=metal&categoryId1=12576&sortOrder=BestMatch&programid=1&campaignid=5337637096&toolid=10039&listingType1=All&lgeo=1&descriptionSearch=true&feedType=rss"; 
   $default_items = "12";
   
   if ($optionsx['feed_one'] == '') { 
   $feedone = $default_feed;
   } else {
   $feedone = $optionsx['feed_one']; 
   }
   
   if ($optionsx['items_feed_one'] == '') { 
   $feedoneitems = $default_items;
   } else {
   $feedoneitems = $optionsx['items_feed_one']; 
   }
   
   if ($optionsx['feed_two'] == '') { 
   $feedtwo = $default_feed;
   } else {
   $feedtwo = $optionsx['feed_two']; 
   }
   
   if ($optionsx['items_feed_two'] == '') { 
   $feedtwoitems = $default_items;
   } else {
   $feedtwoitems = $optionsx['items_feed_two'];
   }
   
   if ($optionsx['feed_three'] == '') { 
   $feedthree = $default_feed;
   } else {
   $feedthree = $optionsx['feed_three']; 
   }
   
   if ($optionsx['items_feed_three'] == '') { 
   $feedthreeitems = $default_items;
   } else {
   $feedthreeitems = $optionsx['items_feed_three']; 
   }
   
   if ($optionsx['feed_four'] == '') { 
   $feedfour = $default_feed;
   } else {
   $feedfour = $optionsx['feed_four']; 
   }
   
   if ($optionsx['items_feed_four'] == '') { 
   $feedfouritems = $default_items;
   } else {
   $feedfouritems = $optionsx['items_feed_four']; 
   }
   if ($optionsx['feed_five'] == '') { 
   $feedfive = $default_feed;
   } else {
   $feedfive = $optionsx['feed_five']; 
   }
   
   if ($optionsx['items_feed_five'] == '') { 
   $feedfiveitems = $default_items;
   } else {
   $feedfiveitems = $optionsx['items_feed_five']; 
   }
   ?>
<div class="ebay_affiliate_system">
<!-- Feed ONE Items -->
<?php
   include_once(ABSPATH.WPINC.'/rss.php'); // path to include script
   $feed = fetch_rss($feedone); // specify feed url
   
   $items = array_slice($feed->items, 0, $feedoneitems); // specify first and last item
   ?>
<?php if (!empty($items)) : ?>
<?php foreach ($items as $item) : ?>
<div class="ebayaff_single_feed_item">
   <div class="ebayaff_item_description_one">
      <p><?php echo $item['description']; ?></p>
   </div>
   <div class="ebayaff_item_title">
      <a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
   </div>
   <div class="ebayaff_item_description_two">
      <p><?php echo $item['description']; ?></p>
   </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
<!-- Feed TWO Items -->
<div id="feedtwo" style="display:none;">
   <div style="height: 1px;display: inline-block;width: 100%;border-top: 1px solid #dfdfdf;margin-bottom: 22px;"></div>
   <?php
      $feedx = fetch_rss($feedtwo); // specify feed url
      $items = array_slice($feedx->items, 0, $feedtwoitems); // specify first and last item
      ?>
   <?php if (!empty($items)) : ?>
   <?php foreach ($items as $item) : ?>
   <div class="ebayaff_single_feed_item">
      <div class="ebayaff_item_description_one">
         <p><?php echo $item['description']; ?></p>
      </div>
      <div class="ebayaff_item_title">
         <a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
      </div>
      <div class="ebayaff_item_description_two">
         <p><?php echo $item['description']; ?></p>
      </div>
   </div>
   <?php endforeach; ?>
   <?php endif; ?>
</div>
<!-- Feed THREE Items -->
<div id="feedthree" style="display:none;">
   <div style="height: 1px;display: inline-block;width: 100%;border-top: 1px solid #dfdfdf;margin-bottom: 22px;"></div>
   <?php
      $feedx = fetch_rss($feedthree); // specify feed url
      $items = array_slice($feedx->items, 0, $feedthreeitems); // specify first and last item
      ?>
   <?php if (!empty($items)) : ?>
   <?php foreach ($items as $item) : ?>
   <div class="ebayaff_single_feed_item">
      <div class="ebayaff_item_description_one">
         <p><?php echo $item['description']; ?></p>
      </div>
      <div class="ebayaff_item_title">
         <a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
      </div>
      <div class="ebayaff_item_description_two">
         <p><?php echo $item['description']; ?></p>
      </div>
   </div>
   <?php endforeach; ?>
   <?php endif; ?>
</div>
<!-- Feed FOUR Items -->
<div id="feedfour" style="display:none;">
   <div style="height: 1px;display: inline-block;width: 100%;border-top: 1px solid #dfdfdf;margin-bottom: 22px;"></div>
   <?php
      $feedx = fetch_rss($feedfour); // specify feed url
      $items = array_slice($feedx->items, 0, $feedfouritems); // specify first and last item
      ?>
   <?php if (!empty($items)) : ?>
   <?php foreach ($items as $item) : ?>
   <div class="ebayaff_single_feed_item">
      <div class="ebayaff_item_description_one">
         <p><?php echo $item['description']; ?></p>
      </div>
      <div class="ebayaff_item_title">
         <a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
      </div>
      <div class="ebayaff_item_description_two">
         <p><?php echo $item['description']; ?></p>
      </div>
   </div>
   <?php endforeach; ?>
   <?php endif; ?>
</div>
<!-- Feed FIVE Items -->
<div id="feedfive" style="display:none;">
   <div style="height: 1px;display: inline-block;width: 100%;border-top: 1px solid #dfdfdf;margin-bottom: 22px;"></div>
   <?php
      $feedx = fetch_rss($feedfive); // specify feed url
      $items = array_slice($feedx->items, 0, $feedfiveitems); // specify first and last item
      ?>
   <?php if (!empty($items)) : ?>
   <?php foreach ($items as $item) : ?>
   <div class="ebayaff_single_feed_item">
      <div class="ebayaff_item_description_one">
         <p><?php echo $item['description']; ?></p>
      </div>
      <div class="ebayaff_item_title">
         <a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
      </div>
      <div class="ebayaff_item_description_two">
         <p><?php echo $item['description']; ?></p>
      </div>
   </div>
   <?php endforeach; ?>
   <?php endif; ?>
</div>
<!-- Load New Feed (Load More Button) -->
<div id="remove_line" style="height: 1px;display: inline-block;width: 100%;border-top: 1px solid #dfdfdf;margin-bottom: 22px;"></div>
<div class="ebayaff_load_more">
   <button id="ebayaff_load_more_button">Load More Products</button>
</div>
<script type="text/javascript">
   window.onload = function(){ 
   var functions = [
       function () { document.getElementById('feedtwo').style.display = "inline-block"; },
       function () { document.getElementById('feedthree').style.display = "inline-block"; },
       function () { document.getElementById('feedfour').style.display = "inline-block"; },
       function () { 
   document.getElementById('feedfive').style.display = "inline-block"; 
   document.getElementById('ebayaff_load_more_button').remove();
   document.getElementById('remove_line').remove();
   }
   ];
   var anchorsx = document.getElementsByTagName('button');
   var i = -1;
   anchorsx[0].onclick = function() {    
       if (i < 3) {
           functions[++i]();
       }
       else {
           functions[3]();
       }
   }
   }
</script>