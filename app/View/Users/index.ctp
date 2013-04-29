<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="large-12 column">
        <div class="section-container tabs" data-section>
            <section class="section">
                <p class="title"><a href="#pass">Manage Passes</a></p>
                <div class="content" data-slug="filters">
                    <div class="row">
                        <div class="large-12 columns">
                            <h3>Manage Passes</h3>

                            <ul class="left" style=" width: 800px;">

                                <li style="width: 100px; float: left;">&nbsp;</li>
                                <li style="width: 100px; float: left;">&nbsp;</li>
                                <li style="width: 100px; float: left;">&nbsp;</li>
                                <li style="width: 100px; float: left;">Name</li>
                                <li style="width: 150px; float: left;">Downloads</li>
                                <li style="width: 150px; float: left;">Download limit</li>
                            </ul>
                                  <?
                                     foreach ($user[0]['Pass'] as $p) { ?>

                                         <ul class="left" style=" width: 800px;">
                                        <li style="width: 50px; float: left; display: none;"><? echo $p['id'] ?></li>
                                        <li style="width: 100px; float: left;"><img src="<? echo $p['iconImage'] ?>" width="50px" alt="icon" /></li>
                                             <li style="width: 100px; float: left;"><a href="/pass/web_pass/<? echo $p['id'] ?>">view pass</a></li>
                                        <li style="width: 100px; float: left;"><a href="/pass/web_pass/<? echo $p['id'] ?>">Get Code</a></li>
                                        <li style="width: 100px; float: left;"><? echo $p['organizationName']?></li>
                                        <li style="width: 150px; float: left;"><? echo $p['download_count']?>
                                            <a href="/pass/download_report/<? echo $p['id'] ?>" target="_blank">Export</a>
                                        </li>
                                        <li style="width: 250px; float: left;">
                                            <input type="radio" name="limit" value="no-limit"> no limit<br>
                                            <input type="radio" name="limit" value="limit" > limit to
                                            <input style="width: 50px;" class="update_limit" id="download_limit_<? echo $p['id'] ?>" name="download_limit_<? echo $p['id'] ?>" value="<? echo $p['download_limit']?>" /> downloads</li>
                                       </ul>
                                <? } ?>

                        </div>
                    </div>
                </div>
            </section>
            <section class="section">
                <p class="title"><a href="#customer">Manage Customers</a></p>
                <div class="content" data-slug="customer">
                    <div class="row">
                        <div class="large-12 columns">

                        </div>
                    </div>
                </div>
            </section>
            <section class="section">
                <p class="title"><a href="#pass">Manage Payments</a></p>
                <div class="content" data-slug="payment">
                    <div class="row">
                        <div class="large-12 columns">
                            Manage Payments
                        </div>
                    </div>
                </div>
            </section>
            <section class="section">
                <p class="title"><a href="#customer">Manage Profile</a></p>
                <div class="content" data-slug="profile">
                    <?=$this->element('users/edit'); ?>
                    <div class="row">
                        <div class="large-4 columns">
                            Name
                            <?
                             echo "<pre>";
                             print_r($user[0]['User']);
                            echo "</pre>";
                            ?>
                        </div>
                           <div class="large-8 columns">
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

<script>
$(document).ready(function() {

    $(document).foundation();

    $('.update_limit').click(function(e){
         var id = this.id;
         var input_id = "#download_limit_"+id;

        //alert($(input_id).val());

        $.ajax({
            type: "POST",
            url: "/pass/update_download_limit",
            data: {'pass_id': id, 'limit': $(input_id).val() },
            success: function (msg) {
                if(msg.response == true){
                    alert('download limit has been updated');
                }
                else {
                    alert('Problem in saving. Please try later');
                }
            }
        });
    });


});
</script>