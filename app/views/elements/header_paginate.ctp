<div class="pageinfo">
  <p><?php 
  echo $paginator->counter(array(
        'format' => 'Halaman %page% dari total %pages% halaman,
                     menampilkan %current% data, dari total %count% data.'
                     
  ));

  /*echo $paginator->counter(array(
        'format' => 'Halaman %page% dari %pages%,
                     menampilkan %current% data dari total %count% data,
                     menampilkan data %start%, sampai %end%'
  ));*/
  ?></p>
</div>