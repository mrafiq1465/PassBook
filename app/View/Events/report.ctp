<section class="list">
    <?=$this->element('menu', array("heading" => "Event Report"));?>
    <section id="form-container">
        <ul>
            <li>Event name:<?=$event['Event']['name']?></li>
            <form action="/events/reports/<?=$event['Event']['id']?>" method="post">
                <li>Start date: <input name="data[Event][date_start]" type="date" value=""/></li>
                <li>End date: <input name="data[Event][date_end]" type="date" value=""/></li>
                <input type="submit" value="Filter" name="submit"/>
            </form>
            <li>Status: <?=$event['Event']['status']?></li>
            <li><?=count($event_actions)?> Submissions</li>
            <li><a href="/events/download_submissions/<?=$event['Event']['id']?>">Export all</a></li>
        </ul>
    </section>
    <div class="submission_list">
        <ul>
            <? foreach($event_actions as $event_action) {
              $blacklist = '';
            if($event_action['EventAction']['blacklist']){
                $blacklist = "checked";
              }
            ?>
            <li>
                <img src="<?php echo S3_IMG_URL.'/'.$event_action['EventAction']['photo']; ?>" alt="" />
                <input class="blacklist" id="<?php echo $event_action['EventAction']['id']; ?>" type="checkbox" <?php echo $blacklist; ?>  /> BlackList
                <br /><br />
                <a href="/events/download_submissions/<?=$event['Event']['id']?>/<?=$event_action['EventAction']['id']?>">Export</a>
            </li>
            <? } ?>
        </ul>
    </div>
</section>


