<section class="list">
    <?=$this->element('menu', array(
        "heading" => "Manage Events"
    ));?>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Thumb</th>
            <th>Details</th>
            <th>Status</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <? echo $this->Form->input('company_id', array('options' => $companies, 'default' => !empty($_GET['company'])?$_GET['company']:'')); ?>
            </td>
        </tr>

        <? foreach ($events as $k => $event) { ?>
        <tr class="<?=($k % 2 == 0) ? 'odd' : 'even'?>">
            <td class="span3">
                <img src="<?=$event['Event']['img_thumb']; ?>" alt="Image thumb" width="90px" height="60px" />
            </td>
            <td class="span5">
                <div class="details">
                    <h5><?=$event['Event']['name'];  ?> </h5>

                    <div class="info">
                        <?=$event['Event']['shortdescription'];  ?>
                    </div>
                </div>
            </td>
            <td class="span2">
                <?
                    $now = time();
                    if(strtoupper($event['Event']['stage']) == 'SCHEDULED'){
                        if($now > strtotime($event['Event']['date_start']) && $now < strtotime($event['Event']['date_end']) ){
                            $status = 'RUNNING';
                        } elseif ($now < strtotime($event['Event']['date_start']) ){
                            $status = 'SCHEDULED';
                        } else {
                            $status = 'CLOSED';
                        }
                    } else {
                        $status = 'DRAFT';
                    }
                ?>
                <div class="event_status"><?=$status?></div>
                <div class="event_start_date"><?
                    if($status != 'DRAFT'){
                        echo date('d/m/y', strtotime($event['Event']['date_start']));
                    }
                    ?></div>
            </td>
            <td>
                <?=$this->Html->link('<i class="icon-share"></i> ', '/events/report/' . $event['Event']['id'], array('class' => '', 'escape' => FALSE)); ?>
            </td>
            <td>
                <?=$this->Html->link('<i class="icon-pencil"></i> ', '/events/edit/' . $event['Event']['id'], array('class' => '', 'escape' => FALSE)); ?>
            </td>
            <td>
                <?=$this->Html->link('<i class="icon-trash"></i> ', '/events/delete/' . $event['Event']['id'], array('class' => 'del-btn', 'item_name'=> $event['Event']['name'], 'escape' => FALSE)); ?>
            </td>
            <td>
                <?=$this->Html->link('<i class="icon-rss"></i> ', '/events/rss/' . $event['Event']['id'], array('target' => '_blank', 'class' => '', 'escape' => FALSE)); ?>
            </td>
            <td>
                <?=$this->Html->link('<i class="icon-pencil"></i> ',$event['Event']['name'], array('target' => '_blank', 'class' => '', 'escape' => FALSE)); ?>
            </td>
        </tr>
            <? } ?>
        </tbody>
    </table>
</section>

<script type="text/javascript">
$(function(){
    $('#company_id').change(function(){
        if($(this).val() != ''){
            window.location.href= '/events/?company=' + $(this).val();
        } else {
            window.location.href= '/events/';
        }
    })
});
</script>