<div class="row">
    <div class="large-12 columns text-center">
        <img src="/<?=$this->data['Pass']['logoImage'];?>" alt="Logo" />
    </div>
</div>
<div class="row">
    <div class="large-12 columns text-center">
        <a class="pb-btn small" href="/pass/web/<?=$this->data['Pass']['id']?>">Download WebPass</a>
    </div>
</div>
<div class="row">
    <div class="large-12 columns text-center">
        <?
     //if($download_link){
        ?>
        <a style=" margin-top: 30px;" class="pb-btn small" href="/pass/download_pkpass/<?=$this->data['Pass']['id']?>">Add To Passbook</a>
        <?//}
        ?>
    </div>
</div>
