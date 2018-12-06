<?php 
    $page_title = "Search Our Site";
    require('includes/header.php');
    require('includes/database.php');
?>
    <h2>Search Our Database of Albums!</h2>
    <p>We understand that sometimes you are looking for a specific item and don't want to wade through a long list of items. Use this instead to speed up your shopping experience! All searches are based on the name of the album, and are 'AND' searches</p>
    <br>
    <form action="search_result.php" method="POST">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form>
</body>
</html>

<?php 
    require('includes/footer.php')
?>