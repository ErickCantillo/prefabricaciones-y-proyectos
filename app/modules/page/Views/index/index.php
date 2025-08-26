<style>
  .info-no-home {
    display: none;
  }

  .offcanvas-body .navbar-nav {
    justify-content: start !important;
  }
</style>
<?php echo $this->banner ?>
<div class="contenido-home">
  <?php echo $this->contenido ?>

</div>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const header = document.getElementById("mainHeader");
    const infoHeader = document.getElementById("info-no-home");
    const threshold = 50;

    function handleStickyHeader() {
      // Solo aplicar sticky en pantallas mayores a 991px
      if (window.innerWidth > 991) {
        if (window.scrollY > threshold) {
          header.classList.add("sticky-active");
          if (infoHeader) {
            infoHeader.style.display = "block"; // Show info-header
          }
        } else {
          header.classList.remove("sticky-active");
          if (infoHeader) {
            infoHeader.style.display = "none"; // Hide info-header
          }
        }
      } else {
        // Remover sticky en pantallas menores o iguales a 991px
        header.classList.remove("sticky-active");
      }
    }

    window.addEventListener("scroll", handleStickyHeader);
    window.addEventListener("resize", handleStickyHeader);
  });
</script>