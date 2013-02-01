



 <div id="top">
     <img src="<?php echo $event['Event']['public_logo']; ?>" alt="" />

     <?php
     //var_dump($event);
     echo $event['Event']['public_description'];
     ?>

 </div>

 <div id="bottom">
     <?php

     foreach($event['EventAction'] as $ev){
        if($ev['blacklist'] != 1){
         ?>
           <img src="<?php echo S3_IMG_URL.'/'.$ev['photo']; ?>" alt="" />
         <?php
        }
     }

     ?>
 </div>