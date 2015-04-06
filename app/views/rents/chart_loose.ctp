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
<div id="left">
<div class="chart">
	<h2 class="center">Jumlah Transaksi Buku Rusak Tahun <?php echo $year;?></h2>
	<div class="dont-print">
	<?php echo $fusionCharts->render('Column3D Chart'); 
	
	?>
	</div>
	<div class="print-me">
	<table>
			<tr>
				<th class="large-print">Bulan</th>
				<th class="large-print">Quantity</th>
			</tr>
			
			<?php $bulan=array('Januari', 'Februari','Maret', 'April','May', 'Juni','July', 'Agustus','September', 'Oktober','November', 'Desember');
			$hasil = array($jumlahbulan1,$jumlahbulan2,$jumlahbulan3,$jumlahbulan4,$jumlahbulan5,$jumlahbulan6,$jumlahbulan7,$jumlahbulan8,$jumlahbulan9,$jumlahbulan10,$jumlahbulan11,$jumlahbulan12);
			$i = 0;
			for($i=0;$i<12;$i++){
				
				echo '<tr><td class="large-print">'.$bulan[$i].'</td><td>'.$hasil[$i].' Buku</td></tr>';
			}
			?>
	
		</table>
	</div>
</div>
</div>
<div id="right">
	<div class="right-content">
		<form action="../">
		<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
		    <option value="">--Pilih Tahun--</option>
		    <option value="<?php echo $base_url.($cur_year-2); ?>"><?php echo $cur_year-2;?></option>
		    <option value="<?php echo $base_url.($cur_year-1); ?>"><?php echo $cur_year-1;?></option>
		    <option value="<?php echo $base_url.($cur_year); ?>"><?php echo $cur_year?></option>
		    <option value="<?php echo $base_url.($cur_year+1); ?>"><?php echo $cur_year+1;?></option>
		    <option value="<?php echo $base_url.($cur_year+2); ?>"><?php echo $cur_year+2;?></option>
		</select>
		</form>
	</div>
</div>