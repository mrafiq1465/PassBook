
<div class="row">
    <div class="large-12 column">
        <div class="section-container tabs" data-section>
            <section class="section">
                <p class="title"><a href="#pass">Manage Passes</a></p>
                <div class="content" data-slug="filters">
                    <div class="row">
                        <div class="large-12 columns">
                            <h3>Manage Passes</h3>

                            <ul class="left" style=" width: 800px;">
                                <li style="width: 50px; float: left;">Id</li>
                                <li style="width: 100px; float: left;">Logo</li>
                                <li style="width: 100px; float: left;">Pass link</li>
                                <li style="width: 100px; float: left;">Name</li>
                                <li style="width: 150px; float: left;">Total Download</li>
                                <li style="width: 150px; float: left;">Update limit</li>
                            </ul>
                                  <?
                                     foreach ($user[0]['Pass'] as $p) { ?>

                                         <ul class="left" style=" width: 800px;">
                                        <li style="width: 50px; float: left;"><? echo $p['id'] ?></li>
                                        <li style="width: 100px; float: left;"><img src="<? echo $p['iconImage'] ?>" width="50px" alt="icon" /></li>
                                        <li style="width: 100px; float: left;"><a href="/pass/web_pass/<? echo $p['id'] ?>">Get Code</a></li>
                                        <li style="width: 100px; float: left;"><? echo $p['organizationName']?></li>
                                        <li style="width: 150px; float: left;"><? echo $p['download_count']?>
                                            <a href="/pass/download_report/<? echo $p['id'] ?>" target="_blank">Export</a>
                                        </li>
                                        <li style="width: 150px; float: left;"><input style="width: 50px;" id="download_limit_<? echo $p['id'] ?>" name="download_limit_<? echo $p['id'] ?>" value="<? echo $p['download_limit']?>" /><input id="<? echo $p['id'] ?>" class="update_limit" type="button" value="update"></li>
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
                    <div class="row">
                        <div class="large-12 columns">
                            Manage Profile
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