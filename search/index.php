<?php

require_once '../inc/config.php';

$search_term = '';
if (isset($_GET['s'])) {
  $search_term = trim($_GET['s']);

  if (search_term != '') {
    require_once ROOT_PATH . 'inc/products.php';
    $products = get_products_search($search_term);
    $count = get_products_count();
  }
}

$page_title = 'Search';
$section = 'search';

include ROOT_PATH . 'inc/header.php';

?>

  <div class="section shirts search page">
    
    <div class="wrapper">

      <h1>Search</h1>

      <form method="get" action="./">
        <input type="text" name="s" value="<?php echo htmlspecialchars($search_term); ?>">
        <input type="submit" value="Go">
      </form>

      <?php
        if ($search_term != '') {
          if (!empty($products)) {
            echo "<ul class='products'>";
            foreach ($products as $product) {
              echo get_list_view_html($product);
            }
            echo "</ul>";
          } else {
            echo "<p>There were no matches for that search.</p>";
          }
        }

      ?>

    </div>

  </div>

<?php include ROOT_PATH . 'inc/footer.php'; ?>