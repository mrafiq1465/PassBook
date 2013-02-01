<?php
$this->set('channelData', array(
    'title' => __("Most Recent Posts"),
    'link' => $this->Html->url('/', true),
    'description' => __("Most recent posts."),
    'language' => 'en-us'
));


App::uses('Sanitize', 'Utility');

$postTime = strtotime($event['Event']['created']);

$postLink = array(
    'controller' => 'events',
    'action' => 'edit',
    $event['Event']['id']
);

// This is the part where we clean the body text for output as the description
// of the rss item, this needs to have only text to make sure the feed validates
$bodyText = preg_replace('=\(.*?\)=is', '', $event['Event']['shortdescription']);
$bodyText = $this->Text->stripLinks($bodyText);
$bodyText = Sanitize::stripAll($bodyText);
$bodyText = $this->Text->truncate($bodyText, 400, array(
    'ending' => '...',
    'exact' => true,
    'html' => true,
));

$item = array(
    'title' => $event['Event']['name'],
    'link' => $postLink,
    'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
    'pubDate' => $event['Event']['created']
);
if (!empty($event['Event']['img_thumb'])) {
    $item['eventThumbnail'] = FULL_BASE_URL . $event['Event']['img_thumb'];
}
$item['Client'] = $event['Company']['name'];
for ($i = 1; $i <= 5; $i++) {
    if (!empty($event['Event']["img_overlay_$i"])) $item["OverlayImage$i"] = FULL_BASE_URL . $event['Event']["img_overlay_$i"];
}

for ($i = 1; $i <= count($event['EventAction']); $i++) {
    $item["app_photo_$i"] = array(
        'device' => $event['EventAction'][$i - 1]['phone_type'],
        'url' => S3_IMG_URL . $event['EventAction'][$i - 1]['photo'],
        'date' => date('m-d-Y', strtotime($event['EventAction'][$i - 1]['created'])),
    );
}
echo  $this->Rss->item(array(), $item);

