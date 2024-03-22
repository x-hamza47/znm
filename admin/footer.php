	<!-- /.content-wrapper -->
    <footer class="main-footer">
				
				<strong>Copyright &copy; 2024 ZNM Enterprises All rights reserved.
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
		<!-- Bootstrap 4 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js" defer></script>
		<!-- AdminLTE App -->
		<script src="js/adminlte.min.js" defer></script>
		<?php 
		if(basename($_SERVER['PHP_SELF']) == "create-project.php" || basename($_SERVER['PHP_SELF']) == "edit-project.php") {
			echo '<script src="plugins/summernote/summernote-bs5.min.js"></script>';
			echo '<script src="plugins/dropzone/dropzone.js"></script>';
		};  ?>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<!-- custom js -->
		<script type="module" src="js/custom.js"></script>
	</body>
</html>