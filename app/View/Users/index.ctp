
<div class="row">
    <div class="large-12 column">
        <div class="section-container tabs" data-section>
            <section class="section">
                <p class="title"><a href="#pass">Manage Passes</a></p>
                <div class="content" data-slug="filters">
                    <div class="row">
                        <div class="large-12 columns">
                            <h3>Manage Passes</h3>

                                  <?
                                     foreach ($user[0]['Pass'] as $p) { ?>
                                         <ul>
                                        <li><? echo $p['id'] ?></li>
                                        <li><a href="/pass/web_pass/<? echo $p['id'] ?>">Get Code</a></li>
                                        <li><? echo $p['organizationName']?></li>
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


});
</script>