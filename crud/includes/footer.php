        <!-- Footer -->
        <footer class="footer mt-5 py-3 bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="text-light">© 2024 Inventory System. All rights reserved.</span>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="#" class="text-light text-decoration-none me-3">Privacy Policy</a>
                        <a href="#" class="text-light text-decoration-none">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Custom JavaScript -->
        <script>
            // Fungsi untuk konfirmasi delete
            function deleteBarang(id) {
                if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    window.location.href = 'actions/delete.php?id=' + id;
                }
            }
        </script>
    </body>
</html>