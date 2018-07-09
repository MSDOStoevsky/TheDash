<?php
    $REQ = basename(__FILE__);
    require_once('dash.php');
?>

<section id="settings" class="container">
    <h1>Settings</h1>
    <form action="" method="POST">
        
        
        <div class="row">
            <div class="column">
                Enable Dark Theme
            </div>
            <div class="column">
                <input type="checkbox" id="enable-dark"
                style="
                --dark-text-color: #fff;
                --dark-bg-color: #292929;
                --dark-nav-color: #333333;
                --dark-text-color: #fff;
                ">
            </div>
        </div>

        <hr>
            
        <br>
        <input type="submit" value="Save" disabled>
    </form>
</section>

<script>
    $("#enable-dark").on("click", function(){
        if($("#enable-dark").is(":checked"))
        {
            $(document.body).css("--primary-color", $(this).css('--dark-text-color'));
            $(document.body).css("--primary-nav-color", $(this).css('--dark-nav-color'));
            $(document.body).css("--primary-bg-color", $(this).css('--dark-bg-color'));
            $(document.body).css("--primary-text-color", $(this).css('--dark-text-color'));
        }
        else
        {
            /*
            $(document.body).css("--primary-color",  #ff0000);
            $(document.body).css("--primary-nav-color", #f4f5f6);
            $(document.body).css("--primary-bg-color", inherit);
            $(document.body).css("--primary-text-color", inherit);
            */
        }
    });
</script>