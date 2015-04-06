<?php
/**
	This file is part of FusionCharts plugin for CakePHP.

	FusionCharts plugin for CakePHP is free software: you can redistribute
	it and/or modify it under the terms of the GNU General Public License
 	as published by the Free Software Foundation, either version 3
 	of the License, or (at your option) any later version.

	FusionCharts plugin for CakePHP is distributed in the hope that it
	will be useful, but WITHOUT ANY WARRANTY; without even the implied
	warranty of	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
	See the GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with FusionCharts plugin for CakePHP.
	If not, see <http://www.gnu.org/licenses/>.

	@link http://dsi.vozibrale.com/
	@copyright Copyright 2009-3827, lecterror / Bloody L Software (http://dsi.vozibrale.com/)
*/
?>
<style type="text/css">
.metro h2.charttitle {
	font-size: 26px;
	color: #fff;
	line-height: 40px;
	margin-bottom: 27px;
	font-weight: 300;
	width: 100%;
	
}
</style>
<?php 
echo $javascript->link('/fusion_charts/js/FusionCharts.js');
?>
<div id="left">
<div class="chart">
	<h2 class="center charttitle">Jumlah Transaksi Peminjaman Tahun <?php echo $year;?></h2>
	<div class="dont-print">
	<?php echo $fusionCharts->render('Column3D Chart'); 
	
	?>
	<br/>
	</div>
	
	
</div>
</div>
