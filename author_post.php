<!-- The first include should be config.php -->
<?php require_once('config.php') ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<!-- Retrieve all posts from database  -->

<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
	<title>LSU Wiki | Create Post </title>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<!-- navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php') ?>
		<!-- // navbar -->

<!-- Get all topics -->
<?php $topics = getAllTopics();	?>
	<title>Create Post</title>
</head>
<body>

	<div class="container content">
	

		<!-- Middle form - to create and edit  -->
		<div class="action create-post-div">
			<h1 class="page-title">Create Post</h1> <br>
			<form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/create_post.php'; ?>" >
				<!-- validation errors for the form -->
				<?php include(ROOT_PATH . '/includes/errors.php') ?>

				<label style="float: left; font-family: 'Noto Sans SC'">Title:</label>
				<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
				<label style="float: left; font-family: 'Noto Sans SC'">Featured image: (Optional)</label>
				<input type="file" name="featured_image" >
				<label style="float: left; font-family: 'Noto Sans SC'">Content:</label> <br><br>
				<textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>
				<br><label style="float: left; font-family: 'Noto Sans SC'">Topic:</label> <br>
				<select name="topic_id" style="font-size: 12pt;">
					<option value="" selected disabled>Choose topic</option>
					<?php foreach ($topics as $topic): ?>
						<option value="<?php echo $topic['id']; ?>">
							<?php echo $topic['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				<br>
				<!-- Only admin users can view publish input field -->
				<!--<//?php if ($_SESSION['user']['role'] == "Admin"): ?>-->
					<!-- display checkbox according to whether post has been published or not -->
					<!--<span><//?php if ($published == true): ?>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="publish" checked="checked">&nbsp;
						</label>
					<//?php else: ?>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="publish">&nbsp;
						</label>
					<//?php endif ?>
					</span> -->
				<!--<//?php endif ?>-->
				<!-- if editing post, display the update button instead of create button -->
				<span>
				<?php if ($isEditingPost === true): ?> 
					<button type="submit" class="btn" name="update_post">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_post">Save Post</button>
				<?php endif ?>
				</span>
			</form>
		</div>
		
	</div>
</body>
</html>

<script>
	CKEDITOR.replace('body');
</script>
			<!-- more content still to come here ... -->
		</div>
		<!-- // Page content -->

		<!-- footer -->
		<?php include( ROOT_PATH . '/includes/footer.php') ?>
		<!-- // footer -->