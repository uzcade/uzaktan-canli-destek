<?php 
require $config['init'];
?>
<!DOCTYPE html>
<html>
<head>
<style>
	body {
		margin: 0;
		padding: 0;
		overflow-y: hidden;
	}
	#meet {
		width: 100%;
		height: 100%;
	}
	.leftwatermark {
		background-image: none;
		display: none !important;
	}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://meet.jit.si/external_api.js"></script>
<script>
$(document).ready(function(){

	<?php
		if(isset($_GET['rid'])){
			$request_id = strval($_GET['rid']);
		}
	?>
	
    var domain = "meet.jit.si";
	var options = {
		roomName: <?=$request_id?>,
		width: '100%',
		height: '100%',
		parentNode: document.querySelector('#meet'),
        
        interfaceConfigOverwrite: { TOOLBAR_BUTTONS: [
        'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
        'fodeviceselection', 'hangup', 'profile', 'info', 'chat', 'recording',
        'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
        'videoquality', 'filmstrip', 'invite', 'stats', 'shortcuts',
        'tileview'
        ]},
        
        interfaceConfigOverwrite : { SETTINGS_SECTIONS: [ 'devices', 'language' ]},
        interfaceConfigOverwrite : { DEFAULT_LOCAL_DISPLAY_NAME: 'Ben' },
        interfaceConfigOverwrite : { SHOW_JITSI_WATERMARK: false }
	}
	
	var api = new JitsiMeetExternalAPI(domain, options);
	
    api.addEventListener(videoConferenceLeft, (data) => {
        alert(data);
    });

	setTimeout(function(){ 
        // base_url('panel/supporter')

		
		//api.executeCommand('displayName', 'enderimenender');
		//api.executeCommand('toggleVideo');
		//api.executeCommand('hangup');
		//api.dispose();

 	}, 3000);

});
</script>

<title>UCD</title>
</head>
<body>
<div id="meet"></div>
</body>
</html>