<?php $this->load->view('dashboard/partial/header'); ?>
<?php $this->load->view('dashboard/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2><?= $subjudul ?></h2>
      <ol>
        <li><a href="<?= base_url('') ?>">Home</a></li>
        <li><?= $judul ?></li>
        <li><?= $subjudul ?></li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page">
  <div class="container">
  <div id="calendar"></div>
  </div>
</section>


</main><!-- End #main -->



<?php $this->load->view('dashboard/partial/footer'); ?>
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