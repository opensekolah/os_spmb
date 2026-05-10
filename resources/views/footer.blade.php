<script>
    lucide.createIcons();
</script>



<script>
    function showLoading() {
        document.getElementById('loading-box').classList.add('active');
    }

    function hideLoading() {
        document.getElementById('loading-box').classList.remove('active');
    }

    window.onload = hideLoading;
    window.addEventListener("pageshow", hideLoading);

    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", function() {
                showLoading();
            });
        });

        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", function() {
                showLoading();
            });
        });

    });
</script>

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>
    const notyf = new Notyf({
        duration: 2500,
        position: {
            x: 'left',
            y: 'bottom'
        },
        types: [{
                type: 'success',
                background: '#fff',
                icon: false
            },
            {
                type: 'error',
                background: '#fff',
                icon: false
            }
        ]
    });
</script>
<script>
    <?php if(session('success')): ?>
    notyf.success("<?php echo session('success'); ?>");
    <?php endif; ?>

    <?php if(session('error')): ?>
    notyf.error("<?php echo session('error'); ?>");
    <?php endif; ?>
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.querySelectorAll('.group-box').forEach(function(group){

    let checkboxes = group.querySelectorAll('.infaq-check');
    let title = group.querySelector('.group-title');

    function updateState() {
        let checked = group.querySelectorAll('.infaq-check:checked').length;

        if (checked > 0) {
            group.classList.add('border-primary');
            title.classList.remove('bg-light', 'text-dark');
            title.classList.add('bg-primary', 'text-white');
        } else {
            group.classList.remove('border-primary');
            title.classList.remove('bg-primary', 'text-white');
            title.classList.add('bg-light', 'text-dark');
        }
    }

    checkboxes.forEach(function(cb){
        cb.addEventListener('change', updateState);
    });

});
</script>

<script>
document.querySelectorAll('.infaq-check').forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {

        let kelas = this.dataset.kelas;

        let semua = document.querySelectorAll('.infaq-check[data-kelas="'+kelas+'"]');
        let adaYangDicek = false;

        semua.forEach(function (cb) {
            if (cb.checked) adaYangDicek = true;
        });

        let kelasCheckbox = document.querySelector('.kelas-check[value="'+kelas+'"]');
        let box = kelasCheckbox.closest('.group-box');
        let title = box.querySelector('.group-title');

        if (adaYangDicek) {
            kelasCheckbox.checked = true;

            box.classList.add('border-primary');
            title.classList.remove('bg-light', 'text-dark');
            title.classList.add('bg-primary', 'text-white');

        } else {
            kelasCheckbox.checked = false;

            box.classList.remove('border-primary');
            title.classList.remove('bg-primary', 'text-white');
            title.classList.add('bg-light', 'text-dark');
        }

    });
});
</script>

<!--script>
/*document.getElementById('kelas').addEventListener('change', function() {
    let kelas = this.value;

    if (kelas) {
        document.getElementById('pdfPreview').src = "/datatagihan/pdf/" + kelas;
    }
});*/
</script-->

</body>

</html>
