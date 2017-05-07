<article>
    <div class="form-group">
        <h3>Track a bird</h3>
        <div id="tracker-map"></div>
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