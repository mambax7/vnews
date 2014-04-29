<{includeq file="$xoops_rootpath/modules/vnews/templates/admin/vnews_header.tpl"}>

<div class="marg10">
    <form method="post" name="fselperm" action="permissions.php">
        <table border=0>
            <tr>
                <td>
                    <select name="permtoset" onchange="document.fselperm.submit()">
                        <option value="1" <{$selected0}> ><{$smarty.const._VNEWS_AM_PERMISSIONS_GLOBAL}></option>
                        <option value="2" <{$selected1}> ><{$smarty.const._VNEWS_AM_PERMISSIONS_ACCESS}></option>
                        <option value="3" <{$selected2}> ><{$smarty.const._VNEWS_AM_PERMISSIONS_SUBMIT}></option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="marg10"><{$permform}></div>
