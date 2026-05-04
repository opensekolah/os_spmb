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
    position: { x: 'left', y: 'bottom' },
    types: [
        {
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

<script>
notyf.success('Test berhasil');
</script>

</body>
</html>