<div class="simulator">
    <div id="k-container">
        <div class="side front">

        </div>
        <div class="current side back">

        </div>
    </div>
    <a class="toggle" href="javascript:void(0);">Flip</a>

</div>

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
        width: 100%;
        height: 100%;
    }

    .side {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .front {
        background-image: url('/img/boarding_front.jpg');
    }
    .back{
        background-image: url('/img/boarding.jpg');
    }

</style>
