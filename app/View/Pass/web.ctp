<?php

    $download_limit = $this->data['Pass']['download_limit'];
    $download_count = $this->data['Pass']['download_count'];
    //if($download_limit > $download_count){
    ?>

    <!--div class="row">
        <div class="large-12 columns text-center">
            You can not download this pass. It exceeded the download limit.
        </div>
    </div-->

      <?php
      //}
      //else {
      ?>
        <?=$this->element('web_pass/' . $this->data['PassType']['name']);?>
      <?php
        //}
      ?>



