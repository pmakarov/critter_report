<ul>
    <?php
        $paramsQuery = $this->params->query;
        if(!is_array($paramsQuery))
        {
            $paramsQuery = array();
        }
        $paramsQuery['url'] = ( isset($paramsQuery['url']) ) ? $paramsQuery['url'] : '';
        $url = $paramsQuery['url'];
        unset($paramsQuery['url']);
        $params = $paramsQuery;

        $mobile_url = '/' . $url . '?' . http_build_query( array_merge( $params, array( 'forcedLayout' => 'mobile' ) ) );
        $desktop_url = '/' . $url . '?' . http_build_query( array_merge( $params, array( 'forcedLayout' => 'desktop' ) ) );
    ?>

    <?php if($is_mobile): ?>
        <li><?= $this->Html->link('Desktop Site', $desktop_url, array('target' => '', 'class' => '')) ?></li>
    <?php else: ?>
        <li><?= $this->Html->link('Mobile Site', $mobile_url, array('target' => '', 'class' => '')) ?></li>
    <?php endif; ?>
</ul>