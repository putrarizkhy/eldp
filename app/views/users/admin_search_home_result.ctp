<style type="text/css">
#resume2 .content_transaction_container h2{
    line-height: 0;
    margin-bottom: 10px;
    color: #fff;
    font-weight: 350;
    font-size: 30px;
    /*border-bottom: 1px solid rgba(255,255,255,0.5);*/
    line-height: 30px;
    margin-top: -15px;

}
#resume2 .content_transaction_container p.instructions{
	margin-bottom: 25px;
	width: 80%;
}
.image-right{
	float: left;
	margin-left: 10px;
	clear: right;
	margin-top: 10px;
	border: 2px solid rgba(255,255,255,0.7);
}
.image-right:hover{
	border: 2px solid rgba(255,255,255,1);	
}

.actions .content_transaction_container{
	color: #ffeaca;
}
.desc-detail{
	width: 400px;
	position: relative;
	float: left;
	margin-bottom: 20px;
}
.metro .desc-detail dt{
	width: 100px;
	float: left;
	clear: left;
	margin-bottom: 15px;
	font-family: 'Segoe UI_', 'Open Sans', Verdana, Arial, Helvetica, sans-serif;
}
.desc-detail dd{
	width: 150px;
	float: left;
	margin-left: 0px;
}
.tabrents{
	margin-top: 10px;
	margin-bottom: 20px;
	width:90%;
}

.metro .tabrents .tabs > li a{
	background: #b97815;
	border: none;
	color: #fff;
}
.metro .tabrents .tabs > li a:hover{
	background: #f7b82a;
}
.metro .tabrents .tabs > li.active a{
	color: #000;	
}
.metro .tab-control .frames{
	border: none;
	border-top: 1px solid rgba(255,255,255,0.6);
}
#resume2 p{
	color: #fff;
}

.metro .tab-control .frame{
	padding:20px 0px;
}

</style>
<div class="mask1 content_transaction_container transactionproccess">
  	<div class="actions" style="color:#fff;">
		<?php if(empty($member)): ?>
			
			<script type="text/javascript">
				alert('ID Member tidak ditemukan, silahkan masukkan kembali ID Member untuk memulai transaksi');
				$('#input_id_user_searchhome').val('');
				$('#input_id_user_searchhome').focus();
				
			</script>


		<?php else: ?>

		
		
		<h2><?php __('Penambahan Transaksi');?></h2>
		<p class="instructions"> Anda akan menambahkan transaksi untuk member dengan detail dibawah, silahkan pilih tipe transaksi di tab bawah, setelah selesai, klik tombol selesai</p>
		<?php
		$i = 0;
		$n = 0;
		
			$class = null;
			$n++;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
				
			}
		?>
		
		<dl class="desc-detail">

			<dt><?php __('Id Member'); ?>: </dt>
			<dd>
				<?php echo $member['User']['id_member']; ?>
				&nbsp;
			</dd>
			<dt><?php __('Nama'); ?>: </dt>
			<dd>
				<?php echo $member['User']['name']; ?>
				&nbsp;
			</dd>
			<dt><?php __('Kelas'); ?>: </dt>
			<dd>
				<?php echo $member['User']['kelas']; ?>
				&nbsp;
			</dd>
			<dt><?php __('Alamat'); ?></dt>
			<dd>
				<?php echo $member['User']['alamat']; ?>
				&nbsp;
			</dd>
			<dt><?php __('Telpon'); ?></dt>
			<dd>
				<?php echo $member['User']['kelas']; ?>
				&nbsp;
			</dd>
			
			
		
		</dl>
		<div class="image-right clearfix">
		<?php if(!empty($member['User']['photo'])): ?>  

		    <img src="<?php echo $this->webroot.$member['User']['photo'];?>" alt="<?php echo $member['User']['name']; ?>" width="100" />  

		<?php else:?> 
			 <img src="<?php echo $this->webroot;?>images/no-avatar.png" alt="<?php echo $member['User']['nama']; ?>" width="100" />  
			            
		<?php endif;?>
		</div>
		<div style="float:right;margin-right: 30px;">
			<button class="image-button bg-darkGreen fg-white image-left finish-rents" data-countinside="1" data-url="<?php echo $this->webroot;?>admin/rents/list" data-scope="rentscope" data-background="#df9019 " data-fontcolor="#C2F15F" style="color: rgb(194, 241, 95);">
    		SELESAI
    		<i class="icon-checkmark bg-green fg-white"></i>
			</button>
		</div>

		<div class="clearfix"></div>
		
		<div class="tab-control tabrents" data-role="tab-control">
            <ul class="tabs">
                <li class="active"><a href="#_page_1">Peminjaman</a></li>
                <li class=""><a href="#_page_2">Peminjaman dari Booking</a></li>
                <li class=""><a href="#_page_3">Pengembalian</a></li>
            </ul>

            <div class="frames">
                <div class="frame" id="_page_1" style="display: none;">
                	
                    <p>Ketikkan kode buku yang ingin dipinjam, atau scan barcode buku</p>
                    <?php echo $form->create('Book',array('action'=>'search_modal','enctype'=>'multipart/form-data','autocomplete'=>'off'));?>
	                  <fieldset>
	                    <div class="input-control text" style="width:50%;background:transparent;float:left;">
	                        <input type="text" id="input_id_book_searchhome" placeholder="" name="data[Book][input_id]" style="" id=""/>
	                        <input type="hidden" id="input_id_book_searchhome" placeholder="" name="data[Book][member_id]" style="" value="<?php echo $member['User']['id']; ?>"/>
	                        <button class="primary" type="submit" id="search_book_home_submit" style="position:absolute;left:104%;top:5px;">Submit</button>
	                        <button class="btn-clear" style=""></button>
	                    </div>

	                    
	                    
	                  </fieldset>
	                  <?php echo $form->end();?>
	                  <script type="text/javascript">

		                  	function showResponse_book_search_home(responseText, statusText, xhr, $form)  { 

						      	$('.loadingpagecontainer').hide();


						      	$.Dialog({
						          	overlay: true,
						          	draggable:true,
						          	shadow: true,
						          	flat: false,
						          	width: 850,
						          	height:450,
						          	padding: 10,
						          	icon: '<span class="icon icon-book"></span>',
						          	title: 'Peminjaman Pustaka',
						          	shadow: true,
						          	onShow: function(_dialog){
						            	var content = responseText;
						            	$.Dialog.content(content);
						            	$('#input_id_book_searchhome').val('');
        								$('#input_id_book_searchhome').focus();
						          	}
						      	});
						      

						    }

						    var options_book_seacrh = {
						        //target:        '#output2',   // target element to update
						        //beforeSubmit:  showRequest,  // pre-submit callback
						        success:       showResponse_book_search_home  // post-submit callback
						    };

						    $('#search_book_home_submit').on('click', function(e) {
						        
						        $('#BookSearchModalForm').ajaxSubmit(options_book_seacrh);
						        $('.loadingpagecontainer').show();
						        return false;
						    });

	                  </script>

	                  <div id="table_rent_process" style="display:none;">
                		<table class="table hovered" cellpadding="0" cellspacing="0">
					      <thead>
					        <tr class="title_table">
							<th class="smallest-row"><?php echo ('ID Transaksi');?></th>
							
							<th class="largest-row"><?php echo ('Judul Buku');?></th>

							<th class="largest-row"><?php echo ('Member');?></th>
							
							<th><?php echo ('Tanggal Pinjam');?></th>

							<th><?php echo ('Tanggal Kembali');?></th>
							
							<th><?php echo ('Status');?></th>

							<th class="largest-row"><?php echo ('Actions');?></th>
					          
					        </tr>
					      </thead>
					      <tbody>

					        
					      </tbody>

					    </table>
                	</div>
                </div>
                <div class="frame" id="_page_2" style="display: none;">
                	
                    <table class="table hovered" cellpadding="0" cellspacing="0">
				      <thead>
				        <tr class="title_table">
						<th class="smallest-row"><?php echo ('ID Transaksi');?></th>
						
						<th class="largest-row"><?php echo ('Judul Buku');?></th>

						<th class="largest-row"><?php echo ('Member');?></th>
						
						<th><?php echo ('Tanggal Booking');?></th>
						
						<th><?php echo ('Status');?></th>

						<th class="largest-row"><?php echo ('Actions');?></th>
				          
				        </tr>
				      </thead>
				      <tbody>

				        <?php
				        foreach ($bookings as $item) : ?>
				        <tr class="altrow " id="pengembalian_<?php echo $item['Rent']['id'];?>">
							<td class="smallest-row"><?php echo $item['Rent']['id']?></td>
							<td><?php echo $item['Book']['title']; ?></td>
							<td><?php echo $item['User']['name']; ?></td>
							<td>
								<?php echo $time->niceShort($item['Rent']['created'],null); ?>
							</td>
							<td class="smallest-row" id="kembali_<?php echo $item['Rent']['id'];?>">
								<?php 
								echo '<span class="status out">Booking</span>';
								?>
							</td>
							
				          	<td class="actions3">
					            <a class="dobooked" href="<?php echo $this->webroot;?>admin/rents/view_booked/<?php echo $item['Rent']['id']; ?>"><i class=" icon-plus on-right"></i> Proses Pinjam</a>

					            <a class="cancelbooked" href="<?php echo $this->webroot;?>admin/rents/cancelbook/<?php echo $item['Rent']['id']; ?>"><i class=" icon-cancel on-right"></i> Cancel Booking</a>
				          	</td>
				          	
				        </tr>
				        <?php endforeach;?>
				        
				      </tbody>
				    </table>
                </div>
                <div class="frame" id="_page_3" style="display: block;">

                    <h3 style="margin-top:0;">Buku yang Harus Di Kembalikan Hari Ini / Lebih</h3>

                    <?php if(!empty($duetoday)):?>

                    <table class="table hovered" cellpadding="0" cellspacing="0" id="pengembalian_duetoday">
				      <thead>
				        <tr class="title_table">
						<th class="smallest-row"><?php echo ('ID Transaksi');?></th>
						
						<th class="largest-row"><?php echo ('Judul Buku');?></th>

						<th class="largest-row"><?php echo ('Member');?></th>
						
						<th><?php echo ('Tanggal Kembali');?></th>
						
						<th><?php echo ('Status');?></th>

						<th class="largest-row"><?php echo ('Actions');?></th>
				          
				        </tr>
				      </thead>
				      <tbody>

				        <?php
				        foreach ($duetoday as $item) : ?>
				        <tr class="altrow " id="pengembalian_<?php echo $item['Rent']['id'];?>">
							<td class="smallest-row"><?php echo $item['Rent']['id']?></td>
							<td><?php echo $item['Book']['title']; ?></td>
							<td><?php echo $item['User']['name']; ?></td>
							<td>
								<?php echo $time->niceShort($item['Rent']['tgl_kembali'],null); ?>
							</td>
							<td class="smallest-row" id="kembali_<?php echo $item['Rent']['id'];?>">
								<i class="icon-loop on-left"
    style="background: #bb0000;color: white;padding: 4px;border-radius: 50%;font-size: 10px;"></i>
           								Dipinjam
							</td>
							
				          	<td class="actions3">
					            <a class="doback" href="<?php echo $this->webroot;?>admin/rents/view_back/<?php echo $item['Rent']['id']; ?>"><i class="icon-exit on-right"></i> Kembali</a>

					            <a class="doback" href="<?php echo $this->webroot;?>admin/rents/view_broke/<?php echo $item['Rent']['id']; ?>"><i class=" icon-blocked on-right"></i> Rusak</a>
				          	</td>
				          	
				        </tr>
				        <?php endforeach;?>
				        
				      </tbody>
				    </table>
				    <?php else:?>
						<p>Tidak ditemukan data</p>
					<?php endif;?>


				    <h3 style="margin-top:0;">Buku yang Harus Di Kembalikan di Hari Yang Lain</h3>

				    <?php if(!empty($duemore)):?>
                    <table class="table hovered" cellpadding="0" cellspacing="0" id="pengembalian_duetoday">
				      <thead>
				        <tr class="title_table">
						<th class="smallest-row"><?php echo ('ID Transaksi');?></th>
						
						<th class="largest-row"><?php echo ('Judul Buku');?></th>

						<th class="largest-row"><?php echo ('Member');?></th>
						
						<th><?php echo ('Tanggal Kembali');?></th>
						
						<th><?php echo ('Status');?></th>

						<th class="largest-row"><?php echo ('Actions');?></th>
				          
				        </tr>
				      </thead>
				      <tbody>

				        <?php
				        foreach ($duemore as $item) : ?>
				        <tr class="altrow " id="pengembalian_<?php echo $item['Rent']['id'];?>">
							<td class="smallest-row"><?php echo $item['Rent']['id']?></td>
							<td><?php echo $item['Book']['title']; ?></td>
							<td><?php echo $item['User']['name']; ?></td>
							<td>
								<?php echo $time->niceShort($item['Rent']['tgl_kembali'],null); ?>
							</td>
							<td class="smallest-row" id="kembali_<?php echo $item['Rent']['id'];?>">
								<i class="icon-loop on-left"
    style="background: #bb0000;color: white;padding: 4px;border-radius: 50%;font-size: 10px;"></i>
           								Dipinjam
							</td>
							
				          	<td class="actions3">
					            <a class="doback" href="<?php echo $this->webroot;?>admin/rents/view_back/<?php echo $item['Rent']['id']; ?>"><i class="icon-exit on-right"></i> Kembali</a>

					            <a class="doback" href="<?php echo $this->webroot;?>admin/rents/view_broke/<?php echo $item['Rent']['id']; ?>"><i class=" icon-blocked on-right"></i> Rusak</a>
				          	</td>
				          	
				        </tr>
				        <?php endforeach;
				        ?>
				      </tbody>
				    </table>

					<?php else:?>
						<p>Tidak ditemukan data</p>
					<?php endif;?>


                </div>
                
            </div>

        </div>
        <script type="text/javascript">
        	

        	$('.keteranganatas').animate({
            	height:"13px"
	        }, 1000, function() {
	          // Animation complete.
        	});

			

			function focustoinputrents(){
				$('#input_id_book_searchhome').val('');
				$('#input_id_book_searchhome').focus();
				
			}
			focustoinputrents();



			$(".finish-rents").on('click', function(){

		        var gotourl = $(this).data('url');

		        var fontcolor = $(this).data('fontcolor');

		        var scope = $(this).data('scope');

		        var background = $(this).data('background');

		        var colorfont = $(this).data('fontcolor');

		        var table = $(this).data('table');



		        $('.rb-span-12 h3 a').css('color','#fff');
		        $(this).css('color',colorfont);
		        $('.spinner_container').show();
		        $('#'+scope+'.contenareaajax').hide();
		        $('.tohide').hide();
		        $( ".keteranganatas" ).animate({
		          height:"13px"
		          
		        }, 1000, function() {
		        // Animation complete.
		        });

		        //$('.imageNavinside').hide();
		        //$('.preloadersmall').show();
		        
		        

		        //$('.loadingstate').show();


		        
		        var classElement = $(this);
		        $('.'+scope+'.contentareatoload').css({
		          'background-color': '#fff',
		          '-webkit-transition': 'background-color 200ms linear',
		          '-moz-transition': 'background-color 200ms linear',
		          '-o-transition': 'background-color 200ms linear',
		          '-ms-transition': 'background-color 200ms linear',
		          'transition': 'background-color 200ms linear'

		        });
		        
		        setTimeout(function() {

		          

		          //$('.loadingstate').fadeOut();
		          $('.tohide').show();
		          $( ".keteranganatas" ).animate({
		            height:"190px"
		            
		          }, 1000, function() {
		          // Animation complete.
		          });
		          window.areatoswitch = $(classElement).data('countinside');
		          console.log(window.areatoswitch);
		          switch(window.areatoswitch) {
		          case 1:
		              $('.countinside_1_container').show();
		              $('.countinside_2_container').hide();
		              $('.countinside_3_container').hide();
		              $('.countinside_4_container').hide();
		              $('.countinside_5_container').hide();
		              break;
		          case 2:
		              $('.countinside_1_container').hide();
		              $('.countinside_2_container').show();
		              $('.countinside_3_container').hide();
		              $('.countinside_4_container').hide();
		              $('.countinside_5_container').hide();
		              break;

		          case 3:
		              $('.countinside_1_container').hide();
		              $('.countinside_2_container').hide();
		              $('.countinside_3_container').show();
		              $('.countinside_4_container').hide();
		              $('.countinside_5_container').hide();
		              break;

		          case 4:
		              $('.countinside_1_container').hide();
		              $('.countinside_2_container').hide();
		              $('.countinside_3_container').hide();
		              $('.countinside_4_container').show();
		              $('.countinside_5_container').hide();
		              break;

		          case 5:
		              $('.countinside_1_container').hide();
		              $('.countinside_2_container').hide();
		              $('.countinside_3_container').hide();
		              $('.countinside_4_container').hide();
		              $('.countinside_5_container').show();
		              break;

		          default:
		              $('.countinside_1_container').hide();
		              $('.countinside_2_container').hide();
		              $('.countinside_3_container').hide();
		              $('.countinside_4_container').hide();
		              $('.countinside_5_container').hide();
		          }


		          $('.spinner_container').hide();

		          $.ajax({
		            type: "POST",
		            dataType: "html",
		            cache: false,
		            url: gotourl,
		            //data: $("#postp").serializeArray(), // all form fields
		            success: function (data) {
		              
		              $('#'+scope+'.contenareaajax').fadeIn();
		              $('#'+scope+'.contenareaajax').html(data);

		              $('#'+scope+'.contenareaajax').find('tbody#categorytable').addClass(table);
		              
		              
		              
		            } // success
		          }); // ajax

		          
		          $('.'+scope+'.contentareatoload').css({
		            'background-color': background,
		            '-webkit-transition': 'background-color 300ms linear',
		            '-moz-transition': 'background-color 300ms linear',
		            '-o-transition': 'background-color 300ms linear',
		            '-ms-transition': 'background-color 300ms linear',
		            'transition': 'background-color 300ms linear'
		          });
		          //$('.preloadersmall').hide();
		          //$('.imageNavinside').show();

		          //function for add transaction
		          $('#cancel_transaction_first').attr('data-scope',areatoswitch);
		          $('.datalink1').css({'color':'#c2f15f'})
		          
		          

		        }, 1000);

		        
		    transcation_back();  
		        
		    });

			$(".doback").on('click', function(){
				
				//$('.loadingpagecontainer').show();
		        
		        var thisurl = $(this).attr('href');
		        var titlePage = 'Pengembalian Pustaka';

		        var Datawidth = 500;
		        var Dataheight = 200;

		        $.ajax({
		          type: "GET",
		          dataType: "html",
		          cache: false,
		          url: thisurl, // preview.php
		          //data: $("#postp").serializeArray(), // all form fields
		          success: function (data) {
		            showdialog(data,titlePage,Datawidth,Dataheight);
		            //console.log(data);
		          } // success
		        }); // ajax
			});


			$(".dobooked").on('click', function(){
				
				//$('.loadingpagecontainer').show();
		        
		        var thisurl = $(this).attr('href');
		        var titlePage = 'Pengembalian Pustaka';

		        var Datawidth = 850;
		        var Dataheight = 450;

		        $.ajax({
		          type: "GET",
		          dataType: "html",
		          cache: false,
		          url: thisurl, // preview.php
		          //data: $("#postp").serializeArray(), // all form fields
		          success: function (data) {
		            showdialog(data,titlePage,Datawidth,Dataheight);
		            //console.log(data);
		          } // success
		        }); // ajax
			});


			function showdialog(datashow,titlePage,Datawidth,Dataheight){
		      	$.Dialog({
					overlay: true,
					draggable:true,
					shadow: true,
					flat: false,
					width:Datawidth,
					height:Dataheight,
					padding: 10,
					icon: '<span class="icon icon-book"></span>',
					title: titlePage,
					shadow: true,
					onShow: function(_dialog){
						var content = datashow;
						$.Dialog.content(content);
					  
					}
		      	});
		    }


		    $(".cancelbooked").on('click', function(){
		    	var clickedItem = $(this);
				$.ajax({
					type: "POST",
					dataType: "json",
					cache: false,
					url: this.href, // preview.php
					//data: $("#postp").serializeArray(), // all form fields
					success: function (data) {
					  console.log(data);
					  
					  // on success, post (preview) returned data in fancybox
					  if(data.status == "true"){

					      //clickedItem.parents('tr').removeClass('details-open');
					      
					    clickedItem.parents('tr').fadeOut('slow',function(){
					        $('.loadingpagecontainer').hide();
					        clickedItem.parents('tr').remove();
					        alert(data.flashMessage);
					    });
					  }else{
					  	
					  }
					} // success
		        }); // ajax
	        });

			
		</script>
		
		<?php endif; ?>
	</div>
</div>
