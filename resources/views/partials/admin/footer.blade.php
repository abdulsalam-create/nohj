 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ asset('backend/lib/chart/chart.min.js') }}"></script>
 <script src="{{ asset('backend/lib/easing/easing.min.js') }}"></script>
 <script src="{{ asset('backend/lib/waypoints/waypoints.min.js') }}"></script>
 <script src="{{ asset('backend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('backend/lib/tempusdominus/js/moment.min.js') }}"></script>
 <script src="{{ asset('backend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
 <script src="{{ asset('backend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.0.2/dist/autoNumeric.min.js"></script>

 {{-- <script>
    // Initialize Quill
    var quill = new Quill('#quill-container', {
        theme: 'snow', // You can choose a different theme if needed
        placeholder: 'Start typing here...',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });
</script> --}}



<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Trumbowyg JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/trumbowyg.min.js"></script>

<!-- Include Quill JavaScript -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


<script>
    // Initialize Trumbowyg editor
    $(document).ready(function() {
        $('#trumbowyg-editor, #trumbowyg-editor-2, #trumbowyg-editor-3').trumbowyg();
    });
</script>

 <!-- Template Javascript -->
 <script src="{{ asset('backend/js/main.js') }}"></script>
 <script type="text/javascript">
     const input = document.getElementById('image-upload');
     const input1 = document.getElementById('image-upload1');
     const input2 = document.getElementById('image-upload2');
     const input3 = document.getElementById('image-upload3');
     const input4 = document.getElementById('image-upload4');

     const preview = document.createElement('img');
     preview.style.width = '200px';
     const preview1 = document.createElement('img');
     preview1.style.width = '200px';
     const preview2 = document.createElement('img');
     preview2.style.width = '200px';
     const preview3 = document.createElement('img');
     preview3.style.width = '200px';
     const preview4 = document.createElement('img');
     preview4.style.width = '200px';
     const previewContainer = document.getElementById('preview-container');
     const previewContainer1 = document.getElementById('preview-container1');
     const previewContainer2 = document.getElementById('preview-container2');
     const previewContainer3 = document.getElementById('preview-container3');
     const previewContainer4 = document.getElementById('preview-container4');

     input.addEventListener('change', function() {
         const file = input.files[0];

         if (file) {
             const reader = new FileReader();

             reader.addEventListener('load', function() {
                 preview.src = reader.result;
             });

             reader.readAsDataURL(file);
         }
     });

     previewContainer.appendChild(preview);

     input1.addEventListener('change', function() {
         const file = input1.files[0];

         if (file) {
             const reader = new FileReader();

             reader.addEventListener('load', function() {
                 preview1.src = reader.result;
             });

             reader.readAsDataURL(file);
         }
     });

     previewContainer1.appendChild(preview1);

     input2.addEventListener('change', function() {
         const file = input2.files[0];

         if (file) {
             const reader = new FileReader();

             reader.addEventListener('load', function() {
                 preview2.src = reader.result;
             });

             reader.readAsDataURL(file);
         }
     });

     previewContainer2.appendChild(preview2);

     input3.addEventListener('change', function() {
         const file = input3.files[0];

         if (file) {
             const reader = new FileReader();

             reader.addEventListener('load', function() {
                 preview3.src = reader.result;
             });

             reader.readAsDataURL(file);
         }
     });

     previewContainer3.appendChild(preview3);

     input4.addEventListener('change', function() {
         const file = input4.files[0];

         if (file) {
             const reader = new FileReader();

             reader.addEventListener('load', function() {
                 preview4.src = reader.result;
             });

             reader.readAsDataURL(file);
         }
     });

     previewContainer4.appendChild(preview4);
 </script>

<script>
 new AutoNumeric('#nairaInput', {
            digitGroupSeparator: ',',
            decimalCharacter: '.',
            currencySymbol: '',
        });
</script>
</body>

</html>
