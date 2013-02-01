<?php
    include (dirname(__FILE__).'/../components/facebook_component.php');
    $fb = new FacebookComponent();
    $user = $fb->getUser();
?>
<table width="100%" cellspacing="0" cellpadding="0"
       style="margin:0px;padding:0px;border:0px;line-height: normal;font-family:arial;background-color:transparent;vertical-align: middle; width: 152px; height: 20px;">
    <tbody>
    <tr>
        <td style="vertical-align:middle;margin:0px;padding:0px;border:0px;">
            <center>
                <table style="margin:0px;padding:0px;border:0px;vertical-align:middle; height: 20px;width:100%"
                       align="center" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr style="height:99%">
                        <td align="right"
                            style="margin:0px;padding:0px;border:0px;vertical-align:middle;text-align:right">
                            <div align="right" style="text-align:right;width:auto"></div>
                        </td>
                        <td align="center"
                            style="width:141px;margin:0px;padding:0px;border:0px;vertical-align:middle;white-space:nowrap"
                            id="header_fb_page">
                            <table align="center" cellspacing="0" cellpadding="0"
                                   style="margin: 0px; padding: 0px; border: 0px; " id="header_fb_p0">
                                <tbody>
                                <tr>
                                    <td align="center" style="margin:0px;padding:0px;border:0px;vertical-align:middle">
                                        <table align="left" cellspacing="0" cellpadding="0"
                                               style="margin:0px;padding:0px;border:0px;">
                                            <tbody>
                                            <tr>
                                                <td style="margin:0px;padding:0px;border:0px;line-height: normal;font-family:arial;font-size:11px;color:#9b9b9b;text-align:center;vertical-align:top">
                                                        <a class="fb_login" onmouseover="this.style.opacity=0.75;this.style.filter='alpha(opacity=75)'"
                                                             onmouseout="this.style.opacity=1;this.style.filter='';"
                                                             title="Facebook" alt="Facebook"
                                                             href="<?php echo $fb->getLoginUrl() ?>"
                                                             style="background: transparent url(http://cdn.gigya.com/gs/i/HTMLLogin/SignInWith/facebook_20.gif) top center no-repeat; zoom: 1; cursor: pointer; width: 141px; height:20px; display: block; opacity: 1; ">
                                                        </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                        <td align="left" style="margin:0px;padding:0px;border:0px;vertical-align:middle;width:48%"></td>
                    </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
    </tbody>
</table>