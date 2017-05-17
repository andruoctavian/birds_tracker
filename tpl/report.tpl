<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
    <article>
        <div class="form-group">
            <h3>Track a bird</h3>
            <div id="report-map" class="google-map"></div>
            <br>
            <label for="bird-select">Select the bird you saw</label>
            <select id="bird-select" class="form-control">
                {foreach from=$birds item=bird}
                    <option value="{$bird->getId()}">{$bird->getName()}</option>
                {/foreach}
            </select>
            <br>
            <button class="btn btn-default" id="submit-report">Report</button>
        </div>
    </article>
</div>
<script type="application/javascript">
    $(document).ready(function () {
        initReportMap();
        $('#content').undelegate('#submit-report', 'click').delegate('#submit-report', 'click', reportBird)
    });
</script>