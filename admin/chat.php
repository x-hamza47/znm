<?php require_once "header.php"; ?>


			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Message</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="inbox.php" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
							<div class="card-body">		
								<?php
									require_once './php/crud.php';
									if (isset($_GET['user'])) {
										$usr_id = htmlspecialchars($_GET['user']);
										$db = new Database();
										$db->beginTransaction();
										try {
											$query = "SELECT * FROM messages WHERE id = ?";
											$query2 = "UPDATE messages SET status = 'read' WHERE id = ?";
											// query 1
											$stmt = $db->prepare($query);
											$stmt->bind_param('i', $usr_id);
											if (!$stmt->execute()) {
												throw new Exception("Connection Error.");
											}else{
												$stmt->bind_result($id, $name ,$phone , $email,$msg,$status,$date,$time);
												 $stmt->fetch();	
											}
											$stmt->close();
											// query2
											$stmt2 = $db->prepare($query2);
											$stmt2->bind_param('i', $usr_id);
					                        if (!$stmt2->execute()) {
												throw new Exception("Updating Error.");
											}
											$stmt2->close();
											$db->commit();																	
								?>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<span id="name" class="form-control" placeholder="Name" ><?php echo $name; ?></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="email">Email</label>
											<span id="email" class="form-control" placeholder="Email"><?php echo $email; ?></span>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label for="phone">Phone</label>
											<span type="text" name="phone" id="phone" class="form-control" placeholder="Phone">	<?php echo ($phone == "") ? "---Empty---":$phone;?></span>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label for="phone">Message</label>
											<textarea  id="address" class="form-control" cols="30" rows="5" style="resize: none;" readonly><?php echo $msg; ?></textarea>
										</div>
									</div>
								</div>

								<?php  	 
								
									
								
							} catch (Exception $e) {
								$db->rollback();
								echo "Transaction failed: " . $e->getMessage();
							}
							}else{
								echo "Error";
							}
								?>
							</div>							
						</div>

					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<?php  require_once "footer.php" ; ?>