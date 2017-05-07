{foreach from=$reports item=report}
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <article>
            <header><strong>{$report->getUser()->getUsername()}</strong> found a <strong>{$report->getBird()->getName()}</strong></header>
            <p>
                Bird: {$report->getBird()->getName()}
                <br>
                Latitude: {$report->getLat()}
                <br>
                Longitude: {$report->getLng()}
            </p>
        </article>
    </div>
{/foreach}