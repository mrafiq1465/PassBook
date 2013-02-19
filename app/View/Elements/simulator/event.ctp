<div class="simulator">

We will use this to flip the screen front & back <br />
    http://demos.kendoui.com/web/fx/flip.html

</div>
<div id="k-container">
    <div class="side" id="store">
        <button class="toggle">Library</button>
    </div>
    <div class="current side" id="library">
        <button class="toggle">Store</button>
    </div>
</div>
<a class="toggle" href="javascript:void(0);">Flip</a>
<script>
    $(".toggle").click(function () {
        var currentSide = $(".current"),
                otherSide = $(".side:not(.current)");

        currentSide.removeClass("current");
        otherSide.addClass("current");

        kendo.fx("#k-container").flipHorizontal(currentSide, otherSide).play();
    });
</script>

<style>
    #k-container {
        position: relative;
        width: 308px;
        height: 468px;
        margin: 0 auto;
        background-color: #000;
        border: 22px solid #000;
        border-radius: 20px;
        box-shadow: 0 0 0 2px #ccc;
    }

    .side {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .side button {
        background: transparent;
        border-style: none;
        border-radius: 3px;
        margin: 8px 0 0 9px;
        color: #fff;
        line-height: 18px;
        padding: 3px 9px 4px;
        text-shadow: 0 -1px 0 rgba(0,0,0,.3);
        cursor: pointer;
    }


    #library button {
        background: -moz-linear-gradient(top, rgba(154,107,61,0.85) 0%, rgba(154,107,61,0.4) 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(154,107,61,0.85)), color-stop(100%,rgba(154,107,61,0.4)));
        background: -webkit-linear-gradient(top, rgba(154,107,61,0.85) 0%,rgba(154,107,61,0.4) 100%);
        background: -o-linear-gradient(top, rgba(154,107,61,0.85) 0%,rgba(154,107,61,0.4) 100%);
        background: -ms-linear-gradient(top, rgba(154,107,61,0.85) 0%,rgba(154,107,61,0.4) 100%);
        background: linear-gradient(to bottom, rgba(154,107,61,0.85) 0%,rgba(154,107,61,0.4) 100%);
        -webkit-box-shadow: 0 0 0 1px rgba(255,255,255,.28), inset 0 0px 0 1px rgba(0,0,0,.28);
        -moz-box-shadow: 0 0 0 1px rgba(255,255,255,.28), inset 0 0px 0 1px rgba(0,0,0,.28);
        box-shadow: 0 0 0 1px rgba(255,255,255,.28), inset 0 0px 0 1px rgba(0,0,0,.28);
    }



    #store button {
        background: -moz-linear-gradient(top, rgba(79,79,79,1) 0%, rgba(39,39,39,1) 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(79,79,79,1)), color-stop(100%,rgba(39,39,39,1)));
        background: -webkit-linear-gradient(top, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
        background: -o-linear-gradient(top, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
        background: -ms-linear-gradient(top, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
        background: linear-gradient(to bottom, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
        -webkit-box-shadow: 0 0 0 1px rgba(255,255,255,.16), inset 0 0px 0 1px rgba(0,0,0,.40);
        -moz-box-shadow: 0 0 0 1px rgba(255,255,255,.16), inset 0 0px 0 1px rgba(0,0,0,.40);
        box-shadow: 0 0 0 1px rgba(255,255,255,.16), inset 0 0px 0 1px rgba(0,0,0,.40);
    }
</style>
