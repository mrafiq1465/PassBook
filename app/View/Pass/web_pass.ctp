<style type="text/css">
    .row {
        margin-bottom: 10px;
    }
    body {
        background-color: <?= $this->data['Pass']['backgroundColor']; ?>;
    }
</style>

<input type="hidden" id="download_count" value="<?=$this->data['Pass']['download_count'];?>">
<input type="hidden" id="download_limit" value="<?=$this->data['Pass']['download_limit'];?>">

<div class="row">
    <div class="large-12 columns text-center">
        <div style="padding: 10px;"><img src="/<?=$this->data['Pass']['logoImage'];?>" alt="Logo" /></div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns text-center">
        <a class="pb-btn small download" href="/pass/web/<?=$this->data['Pass']['id']?>">View Coupon</a>
    </div>
</div>
<div class="row">
    <div class="large-12 columns text-center">
        <?
     //if($download_link){
        ?>
        <a class="pb-btn small download" href="/pass/download_pkpass/<?=$this->data['Pass']['id']?>">Add To Passbook</a>
        <?//}
        ?>
    </div>
</div>
<div class="row hide">
    <div class="large-12 columns text-center">
        <a class="pb-btn small" href="/pass/save_home_screen/<?=$this->data['Pass']['id']?>">save to home screen</a>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $('.download').click(function(e){

            var download_count = $('#download_count').val();
            var download_limit = $('#download_limit').val();

            if( download_limit > download_count) {
               // alert('You can not download this pass. It exceeded the download limit');
            }
            else{
                var href = $(this).attr('href');
                window.location.href = href;
            }
            e.preventDefault();
        });

    });

</script>
