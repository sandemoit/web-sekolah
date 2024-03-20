<?php $this->load->view('dashboardnew/partial/header'); ?>
<?php $this->load->view('dashboardnew/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main class="main">

<div class="site-breadcrumb" style="background-image: url(<?= base_url('assets/upload/images/breadcumb/').$general['breadcumb']?>)">
		<div class="container">
			<h2 class="breadcrumb-title"><?= $subjudul ?></h2>
			<ul class="breadcrumb-menu">
				<li><a href="<?= base_url('') ?>">Home</a></li>
				<li class="active"><?= $subjudul ?></li>
			</ul>
		</div>
	</div>


	<div class="py-120">
		<div class="container">
			<div class="row">
				<div class="col">
					
						<h3 class="mb-3"><?= $subjudul ?></h3>
  
  <div id="calendar"></div>
						
					</div>
					
				
			</div>
		</div>
	</div>

</main>

<?php $this->load->view('dashboardnew/partial/footer'); ?>
<script>
    $(document).ready(function () {

var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

/*/  var events = <?php echo json_encode($data) ?>;/*/

var date = new Date()
var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear()

var Calendar = FullCalendar.Calendar;
var calendarEl = document.getElementById('calendar');

var calendar = new Calendar(calendarEl, {
    headerToolbar: {
        left  : 'prev,next',
center: 'title',
right : ''
    },
    themeSystem: 'bootstrap5',
    //Random default events
    events: "<?php echo base_url(); ?>dashboard/load",
    contentHeight: 500,

    eventClick: function (info) {
        // alert('Event: ' + info.event.extendedProps.description);
        Swal.fire({
            title: "Acara : " + info.event.title,
            html: info.event.extendedProps.tanggal + " <strong>S/d</strong> " + info
                .event.extendedProps.selesai + "<br><h5> Keterangan : " + info.event
                .extendedProps.description + "</h5>",
            icon: "info",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oke'
        })

        info.el.style.borderColor = 'red';
    }

    

});

calendar.render();

    })

</script>