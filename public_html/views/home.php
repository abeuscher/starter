<?php
require("inc/header.php");
$page_content = array(
  "blurb"=>collection('Site Content')->findOne(["label_slug"=>"front-page"])["content"],
  "weddings"=>collection('Site Content')->findOne(["label_slug"=>"weddings"])["content"],
  "resume"=>collection('Site Content')->findOne(["label_slug"=>"resume"])["content"],
  "booking"=>collection('Site Content')->findOne(["label_slug"=>"booking"])["content"]

);
?>
<section class="page-content">
<div class="grid">
<div class="col-8-m col-left">
  <section class="home" id="home" data-page-title="Home">
  <h2>DJ Services</h2>
<div class="blurb user_content">
  <?php
echo $page_content["blurb"];
   ?></div>

   <h2>References</h2>
   <div id="review-slider">
   <?php
   $reviews = collection('References')->find()->toArray();

   foreach($reviews as $review) {
   echo "<div class='cell'><div class='review'>".$review["review"]."</div><cite>".$review["source"]."<span class='date'>".$review["weddingdate"]."</span></cite><div class='venue'>".$review["venue"]."</div></div>";
   }

   ?>
   </div>
</section>
<section class="photos" id="photos" data-page-title="Photos">
<h2>Photos</h2>
<div class="menu" id="gallery-thumbs">
<?php foreach(gallery('Wedding Photos') as $image):
  $path = str_replace("site:","/",$image["path"]);
  ?>

<div class="cell">
    <img src="<?php echo $path; ?>" alt="" />
</div>
<?php endforeach;?>
</div>
</section>
<section class="faq" id="faq" data-page-title="FAQ">
<h2>Frequently Asked Questions</h2>
<?php
$faqs = collection('FAQ')->find()->toArray();

foreach($faqs as $faq) {
echo "<h3>".$faq["question"]."</h3><div class='user_content answer'>".$faq["answer"]."</div>";
}

?>
</section>
<section class="resume" id="resume" data-page-title="Resume">
  <?php
echo $page_content["resume"];
   ?>
</section>
<section class="weddings" id="weddings" data-page-title="Weddings">
  <?php
echo $page_content["weddings"];
   ?>
</section>
</div><div class="col-4-m col-right">
  <section class="booking">
  <?php
echo $page_content["booking"];
   ?>
 </section>
<section class="widgets">
  <h2>Reviews</h2>
 <?php
  $widgets = collection('Front Page Widgets')->find()->toArray();

  foreach(array_reverse($widgets) as $widget) {
    echo $widget["Code"]."<br><br>";
  }

  ?>

</section>
</div></div>
</section>
<?php
require("inc/footer.php");
 ?>
