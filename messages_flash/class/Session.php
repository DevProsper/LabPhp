<?php
class Session{

	public function __construct(){
		session_start();
	}

	public function setFlash($message,$color="white"){
		$_SESSION['flash']['message'] = [
			'color' 	=> $color,
			'message'	=> $message
		];
	}

	public function showFlash(){
		if (!empty($_SESSION['flash'])) {
			foreach ($_SESSION['flash'] as $flash) {
				$color = $flash['color'].'-text';
				?>
				<script type="text/javascript">
					Materialize.toast("<i class='material-icons left <?= $color ?>'>label</i>" 
						+ "<?= $flash['message'] ?>", 5000);
				</script>
			<?php
			}
			unset($_SESSION['flash']);
		}
	}
}  
?>