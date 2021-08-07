<?php
/**
 * This is the template for generating an action view file.
 * The following variables are available in this template:
 * - $this: the ControllerCode object
 * - $action: the action ID
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */

<?php
$label=ucwords(trim(strtolower(str_replace(array('-','_','.'),' ',preg_replace('/(?<![A-Z])[A-Z]/', ' \0', basename($this->getControllerID()))))));
if($action==='index')
{
	echo "\$this->breadcrumbs=array(
		'$label',
		);";
}
else
{
	$action=ucfirst($action);
	echo "\$this->breadcrumbs=array(
		'$label'=>array('/{$this->uniqueControllerID}'),
		'$action',
		);";
}
?>

?>
<!--[if IE 9]>
	<style>
		.error-text {
			color: #333 !important;
		}
	</style>
	<![endif]-->

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="row">
				<div class="col-sm-12">
					<div class="text-center error-box">
						<h1 class="error-text tada animated"><i class="fa fa-times-circle text-danger error-icon-shadow"></i> Dalam Pengerjaan</h1>
						<h2 class="font-xl"><strong>Maaf atas ketidaknyamanan anda.</strong></h2>
						<br />
						<p class="lead semi-bold">
							<strong>Kami sedang melakukan pengerjaan pada halaman ini.</strong><br><br>
							<small>
								Mohon tunggu beberapa saat.
							</small>
						</p>
						<ul class="error-search text-left font-md">
							<li><a href="javascript:void(0);"><small>Kembali Ke Dashboard <i class="fa fa-arrow-right"></i></small></a></li>
							<li><a href="javascript:void(0);"><small>Laporkan ke Teknis <i class="fa fa-mail-forward"></i></small></a></li>				            				            
						</ul>
					</div>

				</div>

			</div>

		</div>
		
	</div>
	

	<script type="text/javascript">	
		pageSetUp();
	</script>
