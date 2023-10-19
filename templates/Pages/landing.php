<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->Html->css('swiper.min.css') ?>
	<?= $this->Html->script('swiper.min.js') ?>

    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="<?= $this->Url->css('home-page.css') ?>" />
</head>

<body>
    <div class="text-overlay">
        <h1>HOME</h1>
    </div>
<div id="my-superset-container">

</div>
<?php echo $this->Html->script('https://unpkg.com/@superset-ui/embedded-sdk'); ?>
<?php

#https://www.linkedin.com/pulse/apache-superset-getting-up-running-soteri-panagou/

$this->Html->scriptStart(['block' => true]);
echo "supersetEmbeddedSdk.embedDashboard({
    id: \"f528af56-f588-445f-9acf-7288b3f99252\",
    supersetDomain: \"http://localhost:8088\",
    mountPoint: document.getElementById(\"my-superset-container\"),
    fetchGuestToken: () => \"$guest_token\", 
    dashboardUiConfig: {
        hideTitle: true,
        hideChartControls: true
    },
  });";
$this->Html->scriptEnd();
echo $this->fetch('script');
?>
<div class="swiper-slide" style="background-image: url('<?= $this->Url->image('sales.jpg') ?>');">
    <div class="slide-content">
        <h2><a href="<?= $this->Url->build(['controller' => 'Sales', 'action' => 'index']) ?>" style="color: white;">Sales</a></h2>
        <p>view and edit the sales records.</p>
    </div>
</div>
<div class="swiper-slide" style="background-image: url('<?= $this->Url->image('farmer.jpg') ?>');">
    <div class="slide-content">
        <h2><a href="<?= $this->Url->build(['controller' => 'Members', 'action' => 'index']) ?>" style="color: white;">Members</a></h2>
        <p>add new members to the system.</p>
    </div>
</div>
<div class="swiper-slide" style="background-image: url('<?= $this->Url->image('lemons.jpg') ?>');">
    <div class="slide-content">
        <h2><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']) ?>" style="color: white;">Products</a></h2>
        <p>add, edit, delete current products.</p>
    </div>
</div>
<div class="swiper-slide" style="background-image: url('<?= $this->Url->image('blazer.jpg') ?>');">
    <div class="slide-content">
        <h2><a href="<?= $this->Url->build(['controller' => 'Staff', 'action' => 'index']) ?>" style="color: white;">Staff</a></h2>
        <p>view and add staff to the system.</p>
    </div>
</div>


</body>
</html>
