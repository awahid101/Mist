<div class="jumbotron">
    <h1>Mist framework</h1>
    <p>Welcome, the Mist framework is an experimental PHP framework. Feel free to share your thoughts with the author</p>
    <p>Website: <a href="http://awahid.net">http://awahid.net</a></p>
</div>

<br/>
<p>Current server time: <?php echo $params['time']; ?></p>

<?php if (isset($params['name'])) : ?>
    <h3>Printing name</h3>
    <p>
        <?php print_r($params['name']); ?>
    </p>
<?php endif; ?>
