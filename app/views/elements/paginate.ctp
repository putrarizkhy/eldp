

<div id="pagination"> 
<?php echo $paginator->prev('<strong>&#65513;</strong> '.__('Sebelumnya', true), array('escape'=>false,'id'=>'prevpage','class'=>'linkpaginate','data-scope'=>$data_scope,'data-background'=>$data_background), null, array('escape'=>false,'id'=>'prevpage','class'=>'disabled_paginate_el','data-scope'=>$data_scope,'data-background'=>$data_background));?>

<?php echo $paginator->numbers(array(
  'before' => '',
  'after' => '',
  'separator' => '',
  'data-scope'=>$data_scope,
  'data-background'=>$data_background,
  'class' => 'number linkpaginate'
));
?>

<?php echo $paginator->next(__('Selanjutnya', true).' <strong>&#65515;</strong>', array('escape'=>false,'id'=>'nextpage','class'=>'linkpaginate','data-scope'=>$data_scope,'data-background'=>$data_background), null, array('escape'=>false,'id'=>'nextpage','class' => 'disabled_paginate_el','data-scope'=>$data_scope,'data-background'=>$data_background));?>

</div>
<script type="text/javascript">
$( '#pagination a' ).on('click', function(){   

        var gotourl = $(this).attr('href');

        var scope = $(this).data('scope');

        var background = $(this).data('background');

        window.colorfont = $(this).data('fontcolor');

        var table = $(this).data('table');



        
        
        $('.spinner_container').show();
        $('#'+scope+'.contenareaajax').hide();
        


        
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

              //$('#'+scope+'.contenareaajax').find('tbody#categorytable').addClass(table);
              
              
              
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

          $('#pagination span.current').css('color',colorfont);
          
          

        }, 1000);

        
    
}); 



</script>