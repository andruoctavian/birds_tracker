<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
    <article>
        <h3>Birds reported</h3>
        <div id="tracker-map" class="google-map"></div>
    </article>
</div>
<script type="application/javascript">
    $(document).ready(function () {
        $.post("/src/routes/tracker.php", function (data) {
            reports = JSON.parse(data);
            initTrackerMap();
        });
    });
</script>