<div class="confirmMsg">
    <img src="../assets/images/stop.png" alt="" title="">

    <p><{$message}></p>

    <form action="<{$url}>" method="post">
        <{securityToken}><{*//mb*}>
        <input type="hidden" name="id" value="<{$id}>">
         <input type="hidden" name="op" value="delete">
        <input type="hidden" name="handler" value="<{$handler}>">
        <input class="formButton" name="post" value="Submit" type="submit">
        <input type="reset" value="Cancel" onClick="history.back()">
    </form>
</div>
