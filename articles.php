<?php

/// This must come first when we need access to the current session
session_start();;

require("classes/components.php");
require("classes/article.php");

Components::pageHeader("Home Page", ["style"], ["mobile-nav"]);

?>

<div class="article-list-container articles-section">



    <div class="article-heading">
        <h2>Latest Articles</h2>
    </div>
    
    <div class="articles-buttons-container">
            <span class="material-symbols-outlined article-arrow-left">
            chevron_left
            </span>
            <span class="material-symbols-outlined article-arror-right">
            chevron_right
            </span>
        </div>
    <div class="book-list">
    
    
        <?php
    
        /**
         * Retrieves all articles from the database
         */
        $articles = Article::getAllArticles();
        Components::latestArticles($articles);
    
        ?>
    </div>
    
    <div class="trending-articles articles-section">
        <div class="article-heading">
            <h2>Trending Articles</h2>
        </div>
    
    
        <div class="book-list ">
    
            <?php
    
                $articles = Article::getAllArticles();
                Components::latestArticles($articles);
    
            ?>
        </div>
    </div>

    <div class="all-articles articles-section">
        <div class="article-heading">
            <h2>All Articles</h2>
        </div>
    
    
        <div class="book-list ">
    
            <!-- <div class="articles-buttons-container">
                <span class="material-symbols-outlined">
                chevron_left
                </span>
                <span class="material-symbols-outlined">
                chevron_right
                </span>
            </div> -->
            <?php
    
                $articles = Article::getAllArticles();
                Components::allBooks($articles);
            ?>


        </div>
    </div>
</div>