<div class="dd" style="max-width:100% !important;" id="nestable">
	<ol class="dd-list">
	<!-- loop -->
	<?php
		$page_nav = $data['tree_menu'];
		foreach ($page_nav as $key => $nav_item) {
			//process parent nav
			$nav_htm = '';
			$id = isset($nav_item["id"]) ? $nav_item["id"] : "0";
			$idmenu = isset($nav_item["menu_id"]) ? $nav_item["menu_id"] : "";
			$kode = isset($nav_item["kode"]) ? $nav_item["kode"] : "";
			$id_parent = isset($nav_item["tblmenu_idparent"]) ? $nav_item["tblmenu_idparent"] : "";
			$url = isset($nav_item["url"]) ? $nav_item["url"] : "#";
			$icon_badge = isset($nav_item["icon_badge"]) ? '<em>'.$nav_item["icon_badge"].'</em>' : '';
			$icon = isset($nav_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$nav_item["icon"].'">'.$icon_badge.'</i>' : "";
			$nav_title = isset($nav_item["title"]) ? $nav_item["title"] : "(No Name)";
			$label_htm = isset($nav_item["label_htm"]) ? $nav_item["label_htm"] : "";
			$is_ajax = isset($nav_item["ajax"]) && !$nav_item["ajax"] ? 'target = "_top"' : '';
			$isChecked = $nav_item['tblroleprivilege_isshow']=='T' ? "checked" : "";
			$nav_htm .= '
				<div class="dd3-content">
					'.$icon.'
					<span>- '.$nav_title.'</span>

					<div class="pull-right">
						Tampilkan?
						<span class="onoffswitch">
							<input '.$isChecked.' name="cbxisTampil" onclick="toogleCheckChild(\''.$idmenu.'\', this);toogleCheckParent(\''.$id_parent.'\', this)" type="checkbox" value="'.$id.'" data-parentId="'.$id_parent.'" data-idmenu="'.$idmenu.'" class="onoffswitch-checkbox" id="priv_'.$id.'">
							<label class="onoffswitch-label" for="priv_'.$id.'"> 
								<div class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></div> 
								<div class="onoffswitch-switch"></div>
							</label> 
						</span>
					</div>
					<!--div class="pull-right mrg-top-min-5">
						<button onclick="tambahSub('.$id.')" data-action="tambahSub" data-id="'.$id.'" rel="tooltip" data-placement="left" data-original-title="Tambah Sub Menu"  type="button" class="button-control btn btn-circle btn-info"><i class="fa fa-plus"></i></button>
						<button onclick="edit('.$id.')" data-action="edit" data-id="'.$id.'" rel="tooltip" data-placement="left" data-original-title="Edit Menu"  type="button" class="button-control btn btn-circle btn-warning"><i class="fa fa-pencil"></i></button>
						<button onclick="hapus('.$id.')" data-action="hapus" data-id="'.$id.'" rel="tooltip" data-placement="left" data-original-title="Hapus Menu"  type="button" class="button-control btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></button>
					</div-->

				</div>
				';

			if (isset($nav_item["sub"]) && $nav_item["sub"])
				$nav_htm .= process_sub_nav($nav_item["sub"]);

			echo '<li class="dd-item" data-id="'.$id.'">'.$nav_htm.'</li>';
		}

		function process_sub_nav($nav_item) {
			$sub_item_htm = "";
			if (isset($nav_item["sub"]) && $nav_item["sub"]) {
				$sub_nav_item = $nav_item["sub"];
				$sub_item_htm = process_sub_nav($sub_nav_item);
			} else {
				$sub_item_htm .= '<ol class="dd-list">';
				foreach ($nav_item as $key => $sub_item) {
					$id = isset($sub_item["id"]) ? $sub_item["id"] : "0";
					$kode = isset($sub_item["kode"]) ? $sub_item["kode"] : "";
					$idmenu = isset($sub_item["menu_id"]) ? $sub_item["menu_id"] : "";
					$id_parent = isset($sub_item["tblmenu_idparent"]) ? $sub_item["tblmenu_idparent"] : "";
					
					$url = isset($sub_item["url"]) ? $sub_item["url"] : "#";
					$icon = isset($sub_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$sub_item["icon"].'"></i>' : "";
					$nav_title = isset($sub_item["title"]) ? $sub_item["title"] : "(No Name)";
					$label_htm = isset($sub_item["label_htm"]) ? $sub_item["label_htm"] : "";
					$is_ajax = isset($sub_item["ajax"]) && !$sub_item["ajax"] ? 'target = "_top"' : '';
					$isChecked = $sub_item['tblroleprivilege_isshow']=='T' ? "checked" : "";

					$sub_item_htm .= '
					<li class="dd-item" data-id="'.$id.'">
						<div class="dd3-content">
							'.$icon.'
							<span>- '.$nav_title.'</span>

							<div class="pull-right">
								Tampilkan?
								<span class="onoffswitch">
									<input '.$isChecked.' name="cbxisTampil" onclick="toogleCheckChild(\''.$idmenu.'\', this);toogleCheckParent(\''.$id_parent.'\', this)" type="checkbox" value="'.$id.'" data-parentId="'.$id_parent.'" data-idmenu="'.$idmenu.'" class="onoffswitch-checkbox" id="priv_'.$id.'">
									<label class="onoffswitch-label" for="priv_'.$id.'"> 
										<div class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></div> 
										<div class="onoffswitch-switch"></div>
									</label> 
								</span>
							</div>
							<!--div class="pull-right mrg-top-min-5">
								<button onclick="tambahSub('.$id.')" data-action="tambahSub" data-id="'.$id.'" rel="tooltip" data-placement="left" data-original-title="Tambah Sub Menu"  type="button" class="button-control btn btn-circle btn-info"><i class="fa fa-plus"></i></button>
								<button onclick="edit('.$id.')" data-action="edit" data-id="'.$id.'" rel="tooltip" data-placement="left" data-original-title="Edit Menu"  type="button" class="button-control btn btn-circle btn-warning"><i class="fa fa-pencil"></i></button>
								<button onclick="hapus('.$id.')" data-action="hapus" data-id="'.$id.'" rel="tooltip" data-placement="left" data-original-title="Hapus Menu"  type="button" class="button-control btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></button>
							</div-->

						</div>
						'.(isset($sub_item["sub"]) ? process_sub_nav($sub_item["sub"]) : '').'
					</li>
					';
				}
				$sub_item_htm .= '</ol>';
			}
			return $sub_item_htm;
		}
	?>
	<!-- //loop -->
	</ol>
</div>

<script type="text/javascript">
	window.idgrup = '<?php echo $judul->tblrole_id; ?>';
	jQuery(document).ready(function($) {
		pageSetUp();
		setTimeout(function() {
			runNestables();
		}, 100);
	});
</script>

<script type="text/javascript">
	$(function () {
		$("#pesan").fadeOut(0);
	});
	
</script>

