<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<style type="text/css">
	a {
		color: #5fb50a;
		cursor: pointer;

	}
	a:hover {
		text-decoration: none;
	}
	a.thumbnail {
		border: 1px solid #5fb50a;

	}
	a.thumbnail:hover {
		box-shadow: 1px 2px 2px #333;
		-moz-box-shadow: 1px 2px 2px #333;
		-webkit-box-shadow: 1px 2px 2px #333;
	}
</style>
<section>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-asterisk"></i> 
		Pada submenu setting user level ini, administrator dapat melakukan pengaturan user level, yaitu mengedit pengaturan hak akses pengguna dalam aplikasi</h1>
        </div>
	</div>
</div>
<div class="row">
<?php foreach ($dataakses as $hakakses): ?>
  <div class="col-xs-6 col-md-3" id="list-<?php echo $hakakses['id']; ?>">
	  <div align="center">
	    <a onclick="edit(<?php echo $hakakses['id']; ?>)" class="thumbnail" id="<?php echo $hakakses['id']; ?>" align="center" style="font-align: center;">
	      <font style="font-size: 66px;" class="fa fa-group"></font> 
	      <p><?php echo $hakakses['kode']; ?></p>
	      <input type="hidden" name="namanya" id="namanya" value="<?php echo $hakakses['id']; ?>">
	    </a>
	   </div>
  </div>
<?php endforeach; ?>
</div>

<div id="detailhakakses">
	
</div>

</section>

<script type="text/javascript">

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();
	
	// PAGE RELATED SCRIPTS
	
	if($('.DTTT_dropdown.dropdown-menu').length){
		$('.DTTT_dropdown.dropdown-menu').remove();
	}

	//fungsi edit

	function edit (id) {
		$("#edit-form").slideDown(1000);
			
		$.ajax({
			url: 'app/tblpengguna/edithakakses2',
			type: 'post',
			data: {id: id},
			success: function(data) {
				 $("#detailhakakses").html(data);
			}
		});
	}

	//fungsi set pertama biar hidden

	$(function () {
		$("#edit-form").slideUp(500);
	});


</script>