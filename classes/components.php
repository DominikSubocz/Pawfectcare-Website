<?php

class Components {
    
    public static function pageHeader($pageTittle, $stylesheets, $scripts){
        require ("components/header.php");   
    }

    public static function pageHeaderAlt($pageTittle, $stylesheets, $scripts){
        require ("components/header-alt.php");   
    }

    public static function pageFooter(){
        require ("components/footer.php");   
    }

    public static function allPets($pets){

        if(!empty($pets)){
            foreach($pets as $pet){
                $petId = Utils::escape($pet["pet_id"]);
                $name = Utils::escape($pet["name_"]);
                $species = Utils::escape($pet["species"]);
                $age = Utils::escape($pet["age"]);
                $filename = Utils::escape($pet["filename"]);

                require("components/book-card.php");


            }


        }

        else{
                
            require("components/no-books-found.php");
        }

    }

    public static function singleBook($pet){
        if(!empty($pet)){
            $petId = Utils::escape($pet["pet_id"]);
            $name = Utils::escape($pet["name_"]);
            $species = Utils::escape($pet["species"]);
            $age = Utils::escape($pet["age"]);
            $filename = Utils::escape($pet["filename"]);

            require("components/book-single.php");
        }

        else{
            require("components/no-single-book-found.php");
        }
    }

    public static function test($test){
        if(!empty($test)){
            $storyText = Utils::escape($test["story_text"]);

            require("components/book-single.php");
        }

        else{
            require("components/no-single-book-found.php");
        }
    }
}