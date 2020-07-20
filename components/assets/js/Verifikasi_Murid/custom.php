<script type="text/javascript" src="<?=base_url().'components/assets/';?>js/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url().'components/assets/';?>js/fullcalendar.min.js"></script>

<script type="text/javascript" >
	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			defaultDate: '<?=$tahun.'-'.$bulan.'-1';?>',
			editable: true,
			events: [
                <?php
                if(!empty($absen)){
					foreach($absen as $a){ 
				?>
				{
					title: '<?php echo '('.$a['subclass_code'].') '.date('H:i',strtotime($a['dtm_presence']));?>',
					start: '<?=date('Y-m-d',strtotime($a['dtm_presence']))?>',
				},
                <?php
                     }
                } ?>
			]
		});
	});
</script>