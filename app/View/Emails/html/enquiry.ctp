<div style="font-family:'Lucida Grande','Lucida Sans Unicode',Tahoma,sans-serif">
    <table cellspacing="0" cellpadding="0"
           style="width:100%;border-bottom:1px solid #eee;font-size:12px;line-height:135%;font-family:'Lucida Grande','Lucida Sans Unicode',Tahoma,sans-serif">
        <tbody>
        <tr>
            <td colspan="2" style="vertical-align:top;padding:7px 9px 7px 0;"><h1>New Contact Recieved!</h1></td>
        </tr>
        <tr style="background-color:#f5f5f5">
            <th style="vertical-align:top;color:#222;text-align:left;padding:7px 9px 7px 9px;border-top:1px solid #eee">
                Name
            </th>
            <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">
                <div><?php echo $info["name"]; ?></div>
            </td>
        </tr>
        <tr style="">
            <th style="vertical-align:top;color:#222;text-align:left;padding:7px 9px 7px 9px;border-top:1px solid #eee">
                Email
            </th>
            <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">
                <a href="mailto:<?php echo $info["email"]; ?>" target="_blank"><?php echo $info["email"]; ?></a>
            </td>
        </tr>

        <tr style="background-color:#f5f5f5">
            <th style="vertical-align:top;color:#222;text-align:left;padding:7px 9px 7px 9px;border-top:1px solid #eee">
                Comments / Questions
            </th>
            <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee">
                <div><?php echo $info["comment"]; ?></div>
            </td>
        </tr>

        </tbody>
    </table>
</div>