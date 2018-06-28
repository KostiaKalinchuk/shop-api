<?php include "views/include/header.php" ?>

<?php
//require_once "test/functions.php";
?>

      <ul id="headlines">

<?php foreach ( $results['articles'] as $article ) { ?>

        <li>
          <h2>
            <span class="pubDate"><?php echo date('j F', $article->publicationDate)?></span><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
            <?php if ( $article->categoryId ) { ?>
            <span class="category"> <a href=".?action=arhive&amp;categoryId=<?php echo $article->categoryId?>"><?php echo htmlspecialchars( $results['categories'][$article->categoryId]->name )?></a></span>
            <?php } ?>
          </h2>
        </li>

<?php } ?>

      </ul>
<?php


// текущая страница
$page = $_GET["page"];
if ($page < 1 or $page == "") $page = 1;
// количество строк-статей на стр.
$limit = 2;
// начало выборки из БД
$start = getStart($page, $limit);

$articles = getAllArticles($start, $limit);
for ($i = 0; $i < count($articles); $i++)
//    echo htmlspecialchars($articles[$i]["summary"])." <br />"
//   echo "<h2><span class=\"pubDate\">".$articles[$i]["title"]." <br /></span></h2>".$articles[$i]["summary"]." <br />";
   echo "<a href=\".?action=viewArticle&amp;articleId=". $articles[$i]["id"]."\">" .$articles[$i]["title"]." <br /></a>".$articles[$i]["summary"]." <br />";


$count_articles = countArticles();
$count_pages = ceil($count_articles / $limit);
?>

<ul class="pagination">
    <? for($i = 1; $i <= $count_pages; $i++){ ?>
        <li><a href="?page=<?= $i ?>"><?= $i?></a></li>
    <? } ?>
</ul>




<!--      <p><a href="./?action=archive">Архів новин</a></p>-->

<?php include "views/include/footer.php" ?>

