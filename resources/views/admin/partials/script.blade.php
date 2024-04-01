 <!--   Core JS Files   -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script src="{{ asset('admin_assets/js/core/popper.min.js') }}"></script>
 <script src="{{ asset('admin_assets/js/core/bootstrap.min.js') }}"></script>
 <script src="{{ asset('admin_assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
 <script src="{{ asset('admin_assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
 <script src="{{ asset('admin_assets/js/plugins/chartjs.min.js') }}"></script>
 <script src="{{ asset('admin_assets/js/custom.js') }}"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
 <script>
     var ctx1 = document.getElementById("chart-line").getContext("2d");

     var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

     gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
     gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
     gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
     new Chart(ctx1, {
         type: "line",
         data: {
             labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
             datasets: [{
                 label: "Mobile apps",
                 tension: 0.4,
                 borderWidth: 0,
                 pointRadius: 0,
                 borderColor: "#5e72e4",
                 backgroundColor: gradientStroke1,
                 borderWidth: 3,
                 fill: true,
                 data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                 maxBarThickness: 6

             }],
         },
         options: {
             responsive: true,
             maintainAspectRatio: false,
             plugins: {
                 legend: {
                     display: false,
                 }
             },
             interaction: {
                 intersect: false,
                 mode: 'index',
             },
             scales: {
                 y: {
                     grid: {
                         drawBorder: false,
                         display: true,
                         drawOnChartArea: true,
                         drawTicks: false,
                         borderDash: [5, 5]
                     },
                     ticks: {
                         display: true,
                         padding: 10,
                         color: '#fbfbfb',
                         font: {
                             size: 11,
                             family: "Open Sans",
                             style: 'normal',
                             lineHeight: 2
                         },
                     }
                 },
                 x: {
                     grid: {
                         drawBorder: false,
                         display: false,
                         drawOnChartArea: false,
                         drawTicks: false,
                         borderDash: [5, 5]
                     },
                     ticks: {
                         display: true,
                         color: '#ccc',
                         padding: 20,
                         font: {
                             size: 11,
                             family: "Open Sans",
                             style: 'normal',
                             lineHeight: 2
                         },
                     }
                 },
             },
         },
     });
 </script>
 <script>
     var win = navigator.platform.indexOf('Win') > -1;
     if (win && document.querySelector('#sidenav-scrollbar')) {
         var options = {
             damping: '0.5'
         }
         Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
     }
 </script>
     @session('success')
     <script>
     Toastify({
         text: "{{ session('success') }}",
         className: "success",
         style: {
             background: "#008000",
         }
         }).showToast();
     </script>
     @endsession
     @session('error')
     <script>
     Toastify({
         text: "{{ session('error') }}",
         className: "success",
         style: {
             background: "red",
         }
         }).showToast();
     </script>
     @endsession
     <script>
         $(document).ready(function() {
             $('.summernote').summernote();
             $('.dropify').dropify();
         });
     </script>
 <!-- Github buttons -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="{{ asset('admin_assets/js/argon-dashboard.min.js') }}"></script>
