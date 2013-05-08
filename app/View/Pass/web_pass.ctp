<style type="text/css">
    .row {
        margin-bottom: 10px;
    }
</style>
<div class="row">
    <div class="large-12 columns text-center">
        <div style="padding: 10px;"><img src="/<?=$this->data['Pass']['logoImage'];?>" alt="Logo" /></div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns text-center">
        <a class="pb-btn small" href="/pass/web/<?=$this->data['Pass']['id']?>">View Coupon</a>
    </div>
</div>
<div class="row">
    <div class="large-12 columns text-center">
        <?
     //if($download_link){
        ?>
        <a class="pb-btn small" href="/pass/download_pkpass/<?=$this->data['Pass']['id']?>">Add To Passbook</a>
        <?//}
        ?>
    </div>
</div>
<div class="row hide">
    <div class="large-12 columns text-center">
        <a class="pb-btn small" href="/pass/save_home_screen/<?=$this->data['Pass']['id']?>">save to home screen</a>
    </div>
</div>
