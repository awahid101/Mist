<div class="container">

    <div class="starter-template">
        <p>List of all posts:</p>

        <?php foreach ($params['blogs'] as $post) : ?>
            <p>
                <?php echo $post->title; ?>
                <a href='blog/view/<?php echo $post->id; ?>'>Click to view more</a>
            </p>
        <?php 
endforeach; ?>
    </div>

</div>