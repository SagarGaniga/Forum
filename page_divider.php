<div class="modal-body row-fluid">
  <div class="col-md-8" id="box">
    <?php
//require("feeds.php");
//require("post.php");
require("profile.php");
    ?>
  </div>
  <div class="col-md-4">
    <!-- Your second column here -->
    <?php
        require("categories.php");
        echo "<br>";
        require("panel.php");
    ?>
  </div>
</div>
