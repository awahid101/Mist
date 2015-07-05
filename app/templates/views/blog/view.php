<div class="container">

    <div class="starter-template">
        <?php if(isset($params['blog']) && isset($params['blog']->title)) :?>
        <h1><?php echo $params['blog']->title; ?></h1>
        <p> <?php echo $params['blog']->content; ?></p>
        <?php 
endif;?>
    </div>

</div>