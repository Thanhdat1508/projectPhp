</main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../public/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../public/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../public/admin/assets/vendor/chart.js/chart.umd.js"></script>
<script src="../public/admin/assets/vendor/echarts/echarts.min.js"></script>
<script src="../public/admin/assets/vendor/quill/quill.min.js"></script>
<script src="../public/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../public/admin/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../public/admin/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../public/admin/assets/js/main.js"></script>
<script src="../public/validator.js"></script>
<script src="../public/admin/ckeditor5/ckeditor.js"></script>
<script src="../public/admin/ckeditor5/ckeditor.js.map"></script>
<script>
  Validator({
    form: '#form-1',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    rules: [
      Validator.isRequired('#idCategory', 'Vui lòng nhập tên danh mục'),
    ],


  })


  Validator({
    form: '#form-sp',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    rules: [
      // Validator.isRequired('#name_product', 'Vui lòng nhập tên sản phẩm'),
      // Validator.isRequired('#title_product', 'Vui lòng nhập tóm tắt sản phẩm'),
      // Validator.isRequired('#cate_product', 'Vui lòng chọn danh mục sản phẩm'),
      // Validator.isRequired('#price_product', 'Vui lòng nhập giá sản phẩm'),
      // Validator.isRequired('#img_product', 'Vui lòng nhập tóm tắt ảnh chính'),
      // // Validator.isRequired('#img_product1', 'Vui lòng nhập tóm tắt ảnh phụ1'),
      // // Validator.isRequired('#img_product2', 'Vui lòng nhập tóm tắt ảnh phụ2'),
      // Validator.isRequired('#gbProduct', 'Vui lựa chọn bộ nhớ cho sản phẩm'),
      // Validator.isRequired('#describeProduct', 'Vui lựa nhập mô tả chi tiết sản phẩm'),


    ],
  })
</script>

<script>
  ClassicEditor
    .create(document.querySelector('#describeProduct'))
    .then(editor => {
      console.log(editor);
    })
    .catch(error => {
      console.error(error);
    });
</script>



</body>

</html>