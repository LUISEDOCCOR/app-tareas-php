</html>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
  const notyf = new Notyf()
  <?php if (!empty($error)): ?>
    notyf.error("<?= $error ?>")
  <?php endif; ?>
</script>
