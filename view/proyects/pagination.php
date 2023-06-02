<?php
function paginate($reload, $page, $tpages, $adjacents) {
	$prevlabel = "Anterior";
	$nextlabel = "Siguiente";
	$out = '<ul class="pagination pagination-rounded mb-0 pull-right">';
	
	// previous label

	if($page==1) {
		$out.= "<li class='page-item disabled'><span><a class='page-link' style='color: black;'>&laquo;</a></span></li>";
	} else if($page==2) {
		$out.= "<li class='page-item'><span><a class='page-link' style='color: black;' href='javascript:void(0);' onclick='load_datos(1)'>&laquo;</a></span></li>";
	}else {
		$out.= "<li class='page-item'><span><a class='page-link' style='color: black;' href='javascript:void(0);' onclick='load_datos(".($page-1).")'>$prevlabel</a></span></li>";

	}
	
	// first label
	if($page>($adjacents+1)) {
		$out.= "<li class='page-item'><a class='page-link' style='color: black;' href='javascript:void(0);' onclick='load_datos(1)'>1</a></li>";
	}
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li class='page-item'><a class='page-link' style='color: black;'>...</a></li>";
	}

	// pages

	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class='page-item active'><a class='page-link' >$i</a></li>";
		}else if($i==1) {
			$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' style='color: black;' onclick='load_datos(1)'>$i</a></li>";
		}else {
			$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' style='color: black;' onclick='load_datos(".$i.")'>$i</a></li>";
		}
	}

	// interval

	if($page<($tpages-$adjacents-1)) {
		$out.= "<li class='page-item'><a class='page-link' style='color: black;'>...</a></li>";
	}

	// last

	if($page<($tpages-$adjacents)) {
		$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' style='color: black;' onclick='load_datos($tpages)'>$tpages</a></li>";
	}

	// next

	if($page<$tpages) {
		$out.= "<li class='page-item'><span><a class='page-link' href='javascript:void(0);' style='color: black;' onclick='load_datos(".($page+1).")'>&raquo;</a></span></li>";
	}else {
		$out.= "<li class='page-item disabled'><span><a class='page-link' style='color: black;'>&raquo;</a></span></li>";
	}
	
	$out.= "</ul>";
	return $out;
}
?>
