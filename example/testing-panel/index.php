<?php
	$params = $_GET + $_POST;

	define('USERID', '');
	define('SECRET', '');

	$command = '';

	if(isset($params['command']) && !empty($params['command']))
		$command = $params['command'];

	function testingAutoload($file)
	{
		$file = str_replace("Sendpulse\\RestApi\\", '../../src/', $file);
		$file = str_replace("/", '\\', $file).'.php';

		if(file_exists($file)) require($file);
	}

	\spl_autoload_register('testingAutoload');

	use Sendpulse\RestApi\ApiClient;
	use Sendpulse\RestApi\Storage\FileStorage;

	$responses = [];
	function logResponse($object)
	{
		global $responses;
		$responses[] = json_encode($object, JSON_UNESCAPED_UNICODE);
	}

	$SPApiClient = new ApiClient(USERID, SECRET, new FileStorage());

	if($command == 'create-mailing-list')
	{
		if(isset($params['name']) && !empty($params['name']))
			logResponse($SPApiClient->createAddressBook($params['name']));
	}

	if($command == 'erase-mailing-list')
	{
		if(isset($params['id']) && !empty($params['id']))
			logResponse($SPApiClient->removeAddressBook($params['id']));
	}

	if($command == 'add-phone-mailing-list')
	{
		$phonesSource = '';
		if(isset($params['phones']) && !empty($params['phones']))
			$phonesSource = $params['phones'];

		$phonesSource = explode(',', $phonesSource);
		$phones = [];
		foreach ($phonesSource as $phoneSource) { $phones[] = trim($phoneSource); }

		if(isset($params['id']) && !empty($params['id']))
			logResponse($SPApiClient->smsAddPhones($params['id'], $phones));
	}

	if($command == 'erase-phone-mailing-list')
	{
		$phonesSource = '';
		if(isset($params['phones']) && !empty($params['phones']))
			$phonesSource = $params['phones'];

		$phonesSource = explode(',', $phonesSource);
		$phones = [];
		foreach ($phonesSource as $phoneSource) { $phones[] = trim($phoneSource); }

		if(isset($params['id']) && !empty($params['id']))
			logResponse($SPApiClient->smsRemovePhones($params['id'], $phones));
	}

	if($command == 'campaign-create')
	{
		$sender = '';
		if(isset($params['sender']) && !empty($params['sender']))
			$sender = $params['sender'];

		$body = '';
		if(isset($params['body']) && !empty($params['body']))
			$body = $params['body'];

		$date = null;
		if(isset($params['date']) && !empty($params['date']))
			$date = date('Y-m-d H:i:s', strtotime($params['date']));

		$transliterate = 0;
		if(isset($params['transliterate']) && !empty($params['transliterate']))
			$transliterate = $params['transliterate'];

		$route = null;
		if(isset($params['route']) && !empty($params['route']))
			$route = $params['route'];

		if(isset($params['id']) && !empty($params['id']))
			logResponse($SPApiClient->smsCreateCampaign($sender, $body, $params['id'], $transliterate, $date, $route));
	}
?>

<html>

<head>
	<title>Sendpulse API testing panel</title>
	<link rel="stylesheet" type="text/css" href="simple-flat-ui.css">
	<link rel="stylesheet" type="text/css" href="simple-flat-ui-extend.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script async src="simple-flat-ui.js"></script>
</head>

<body>
	<div class="ui-kit yellow">

		<?php if(count($responses) > 0): ?>
			<div class="row details">
				<h6>Last request response</h6>

				<?php foreach($responses as $response): ?>
					<p><div class="inline-code"><?php echo $response; ?></div></p>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="row">
			<h1>SMS Service Testing</h1>
		</div>

		<?php if($SPApiClient): ?>

			<div class="row">
				<h5>Mailing list</h5>
				<ul>
					<?php foreach($SPApiClient->listAddressBooks() as $adress): ?>
						<li>
							Name: <span class="inline-code"><?php echo $adress->name; ?></span>, 
							ID:   <span class="inline-code"><?php echo $adress->id; ?></span>
							<span class="list-command">
								<a href="#" class="js-toggle" toggle="mailing-list-commands-<?php echo $adress->id; ?>">Commands</a>
							</span>
							<br>
							<div class="details details-marked hide js-toggle-target" toggle="mailing-list-commands-<?php echo $adress->id; ?>">
								<form action="/index.php?command=add-phone-mailing-list&id=<?php echo $adress->id; ?>" method="post" >
									<div class="row">
										<h6>Add phones to mailing list</h6>
										<div>
											<label class="fake-placeholder full-width-input-with-button">
												<input type="text" name="phones" class="full-width-input">	
												<span>Phones</span>
											</label>
											<button type="submit">Append phones</button>
										</div>
										<div class="hint">
											<p>Just enumerate phones like numbers separated by comma
										</div>
									</div>
								</form>

								<form action="/index.php?command=erase-phone-mailing-list&id=<?php echo $adress->id; ?>" method="post" class="row-top-separator-small">
									<div class="row">
										<h6>Remove phones from mailing list</h6>
										<div>
											<label class="fake-placeholder full-width-input-with-button">
												<input type="text" name="phones" class="full-width-input">	
												<span>Phones</span>
											</label>
											<button type="submit">Remove phones</button>
										</div>
										<div class="hint">
											<p>Just enumerate phones like numbers separated by comma
										</div>
									</div>
								</form>

								<form action="/index.php?command=campaign-create&id=<?php echo $adress->id; ?>" method="post" class="row-top-separator-small">
									<div class="row">
										<h6>Create sending campaign</h6>
										<div class="row">
											<label class="fake-placeholder full-width-input">
												<input type="text" name="sender" class="full-width-input">	
												<span>Sender (optional?)</span>
											</label>
										</div>
										<div class="row">
											<label class="fake-placeholder full-width-input">
												<input type="text" name="body" class="full-width-input">	
												<span>Body</span>
											</label>
										</div>
										<div class="row">
											<label class="fake-placeholder full-width-input">
												<input type="text" name="date" class="full-width-input">	
												<span>Date (optional)</span>
											</label>
										</div>
										<div class="row">
											<label class="fake-checkbox">
												<input type="checkbox" name="transliterate">
												<span></span>				
											</label>
											<div class="fake-checkbox-label">Transliterate</div>
										</div>
										<div class="row">
											<label class="fake-placeholder full-width-input">
												<input type="text" name="route" class="full-width-input">	
												<span>Route (optional)</span>
											</label>
										</div>
										<div class="row">
											<div class="hint">
												<p>Date support any <a href="http://php.net/manual/en/function.strtotime.php">strtottime</a> string</p>
												<p>Route should be object in JSON format like <span class="inline-code">{"UA":"national", "BY":"international"}</span>, where <span class="inline-code">"UA"</span> and <span class="inline-code">"BY"</span> countries what need have message delivery route, <span class="inline-code">"national"</span> and <span class="inline-code">"international"</span> route mode for that counties </p>
											</div>
										</div>
										<button type="submit">Create campaing</button>
									</div>
								</form>

								<p class="row-top-separator-small row-top-separator-padding">
									<a href="/index.php?command=erase-mailing-list&id=<?php echo $adress->id; ?>">Remove this list</a>
								</p>
							</div>
							<div class="inline-code details"><?php print(json_encode($adress, JSON_UNESCAPED_UNICODE)) ?></div>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="row hint">
					<p>SMS mailing use same mailing lists as others</p>
				</div>
			</div>

			<form action="/index.php?command=create-mailing-list" method="post">

				<div class="row row-top-separator">
					<h6>Add mailing list</h6>
					<label class="fake-placeholder full-width-input-with-button">
						<input type="text" name="name" class="full-width-input">	
						<span>Name</span>
					</label>
					<button type="submit">Add new</button>
				</div>
			</form>

		<?php else: ?>

			<div class="row row-top-separator">
				<p>For use api you need first receive credentials</p>
			</div>

		<?php endif; ?>

		<div class="row row-top-separator">
			<h5>Credentials</h5>
			<p>
				The necessary parameters to obtain the key can be found in the private account settings page found on the following URL 
				<a href="https://login.sendpulse.com/settings">https://login.sendpulse.com/settings</a> in the API tab.</p>
		</div>
			
	</div>
</body>

</html>