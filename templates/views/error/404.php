<div class="jumbotron">
	<div class="row">
		<div class="col-md-12">

			<h1><?php echo isset($params["page_title"]) ? $params["page_title"] : "404 Not Found";?></h1>
                        <hr/>
                        
                        <h3>ERROR MESSAGE: <strong><?php echo $params['error'];?></strong></h3>

			<hr />

			<h4>The page you were looking for could not be found</h4>
			<p>This could be the result of the page being removed, the name being changed or the page being temporarily unavailable</p>
			<h4>Troubleshooting</h4>

			<ul>
			  <li>If you spelled the URL manually, double check the spelling</li>
			  <li>Go to our website's home page, and navigate to the content in question</li>
			</ul>

		</div>
	</div>
</div>
