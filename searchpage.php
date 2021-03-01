<!-- The first include should be config.php -->
<?php require_once('config.php') ?>

<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>
<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
	<title>LSU Wiki | Search </title>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container" >
		<!-- navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php') ?>
		<!-- // navbar -->
       <br><br>
        <h2> Search Posts Based on Title</h2>
        <br>

        <form action="<?php echo BASE_URL . 'single_post.php'; ?>" method="get">
      <input  style = "display:inline-block;width: 50%;" type="text"  placeholder="Search.." name="search_title">
      <button type="submit" name="search_btn" href="single_post.php"><i class="fa fa-search" style="padding: 15px;"></i></button>
    </form>
<!-- Page content -->
<div class="content">
			<h2 class="content-title">Suggested Posts</h2>

			<hr>
<!-- more content still to come here ... -->

<!-- Add this ... -->
<?php foreach ($posts as $post): ?>
	<div class="post" style="margin-left: 0px;">
		<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
        <!-- Added this if statement... -->
		<?php if (isset($post['topic']['name'])): ?>
			<a 
				href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
				class="btn category">
				<?php echo $post['topic']['name'] ?>
			</a>
		<?php endif ?>

		<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
			<div class="post_info">
				<h3><?php echo $post['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					<span class="read_more">Read more...</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>
			<!-- more content still to come here ... -->
	</div>


		<!-- footer -->
		<?php include( ROOT_PATH . '/includes/footer.php') ?>
		<!-- // footer -->