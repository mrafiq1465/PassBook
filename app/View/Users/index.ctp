<style type="text/css">
    .user-profile select{
        margin: 0 0 1.33333em 0;
        padding: 0.66667em;
    }
</style>
<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="large-12 column">
        <div class="section-container tabs" data-section>
            <section class="section">
                <p class="title"><a href="#pass">Manage Passes</a></p>
                <div class="content" data-slug="filters">
                    <div class="row">
                        <div class="large-12 columns">
                            <h3>Manage Passes</h3>

                            <table>
                                <thead>
                                <tr>
                                    <th width="200"></th>
                                    <th width="200"></th>
                                    <th width="200"></th>
                                    <th width="200">Name</th>
                                    <th width="200">Downloads</th>
                                    <th>Download limit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? foreach ($user[0]['Pass'] as $p) { ?>
                                <tr data-id="<? echo $p['id'] ?>">
                                    <td width="200"><img src="<? echo $p['iconImage'] ?>" width="50px" alt="icon"/></td>
                                    <td width="150">
                                        <a href="/pass/web_pass/<? echo $p['id'] ?>">view pass</a>
                                    </td>
                                    <td width="150">
                                        <a href="/pass/web_pass/<? echo $p['id'] ?>">Get Code</a>
                                    </td>
                                    <td width="150">
                                        <? echo $p['organizationName']?>
                                    </td>
                                    <td width="150">
                                        <? echo $p['download_count']?>
                                        <a href="/pass/download_report/<? echo $p['id'] ?>" target="_blank">Export</a>
                                    </td>
                                    <td>
                                        <input type="radio" name="limit" value="no-limit"> no limit<br>
                                        <input type="radio" name="limit" value="limit"> limit to
                                        <input style="width: 50px;" class="update_limit"
                                               id="download_limit_<? echo $p['id'] ?>"
                                               name="download_limit_<? echo $p['id'] ?>"
                                               value="<? echo $p['download_limit'] ?>"/> downloads
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                                <? } ?>
                                </tbody>
                            </table>
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
                <div style="font-size: 12px;padding: 20px;" class="content user-profile" data-slug="profile">
                    <?=$this->element('users/edit'); ?>
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