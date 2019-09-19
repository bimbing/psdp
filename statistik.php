<script src="http://phpmu.com/update/jquery.min.js" type="text/javascript"></script>
<script src="http://phpmu.com/update/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
var chart1;
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'pengunjung',
            type: 'column'
         },   
         title: {
            text: 'Laporan Jumlah Pengunjung Perhari'
         },
         xAxis: {
            categories: ['Tanggal Kunjungan']
         },
         yAxis: {
            title: {
               text: 'Jumlah Kunjungan'
            }
         },
              series:             
            [
            <?php 
           $sql   = "SELECT * FROM rb_statistik GROUP BY tanggal DESC LIMIT 9";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
            	$tanggal=$ret['tanggal'];     
				$tampiltanggal=tgl_indoo($ret['tanggal']);   
                 $sql_jumlah   = "SELECT COUNT(ip) as jumlah FROM rb_statistik WHERE tanggal='$tanggal'";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $tampiltanggal; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
</script>
		<div style='width:100%' id='pengunjung'></div>